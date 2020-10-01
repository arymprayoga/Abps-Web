<?php

namespace App\Models;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Google\Cloud\Firestore\FirestoreClient;

class Admin {

    public function initialize(){
        $firestore = new FirestoreClient(['projectId' => 'fir-project-8b7b6']);
        return $firestore;
    }

    public static function readAdmin(){
        $admin = new Admin();
        $firestore = $admin->initialize();
        $collection = $firestore->collection('admin');
        $firstQuery = $collection->orderBy('nama');
        $admin = $firstQuery->documents();
        return $admin;
    }

    public static function addAdmin(array $data){
        $admin = new Admin();
        $firestore = $admin->initialize();
        $firestore->collection('admin')->add($data);
        // $admin = $data;
        return $firestore;
    }

    public static function editAdmin(array $data){
        $admin = new Admin();
        $firestore = $admin->initialize();
        $admin = $firestore->collection('admin')->document($data['id']);
        $admin->update([
            ['path' => 'nama', 'value' => $data['nama']],
            ['path' => 'email', 'value' => $data['email']]
            ]);
        
        return $firestore;
    }

    public static function deleteAdmin(String $id){
        $admin = new Admin();
        $firestore = $admin->initialize();
        $firestore->collection('admin')->document($id)->delete();
        // $admin = $data;
        return $firestore;
    }
}