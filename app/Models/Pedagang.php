<?php

namespace App\Models;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Google\Cloud\Firestore\FirestoreClient;

class Pedagang{

    public function initialize(){
        $firestore = new FirestoreClient(['projectId' => 'fir-project-8b7b6']);
        return $firestore;
    }

    public static function readPedagang(){
        $pedagang = new Pedagang();
        $firestore = $pedagang->initialize();
        $collection = $firestore->collection('pedagang');
        $firstQuery = $collection->orderBy('nama');
        $pedagang = $firstQuery->documents();
        return $pedagang;
    }
}