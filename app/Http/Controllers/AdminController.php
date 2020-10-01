<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Google\Cloud\Firestore\FirestoreClient;
use App\Models\Admin;
use App\Models\Pedagang;

class AdminController extends Controller
{
    public function initialize(){
        $firestore = new FirestoreClient(['projectId' => 'fir-project-8b7b6']);
        return $firestore;
    }

    public function showDashboardAdminPage(){
        // $admin = new Admin();
        // $test = $admin->readData();
        // return $test;
        return view('dashboard-admin');
    }

    public function showDaftarAdminPage(){
        $firestore = new Admin();
        $admin = $firestore->readAdmin();

        return view('daftar-admin', compact('admin'));
    }

    public function tambahAdmin(Request $request){       
        $admin = new AdminController();
        $firestore = $admin->initialize();
        $collection = $firestore->collection('admin');
        $firstQuery = $collection->where('email', '=', $request['email']);
        $documents = $firstQuery->documents();
        $check = 0;
        foreach ($documents as $document) {
            if($document->exists()) {
              $check = 1;
            } 
        }
        if($check == 0){
            $data = [
                'nama' => $request['nama'],
                'email' => $request['email'],
                'password' => $request['password']
            ];
    
            $firestore = Admin::addAdmin($data);
            return back();
        }
        else{
            echo "SAMAWOY";
        }
       
        
    }

    public function editAdmin(Request $request){
        $data= [
        "id" => $request['id'],
        "nama" => $request['nama'],
        "email" => $request['email']
        ];
        
        $firestore = Admin::editAdmin($data);
         
        return back();
    }

    public function deleteAdmin(Request $request){
        $id = $request['id'];
        $firestore = Admin::deleteAdmin($id);
        return back();
    }

    public function showDaftarPedagangPage(){
        $firestore = new Pedagang();
        $pedagang = $firestore->readPedagang();

        return view('daftar-pedagang', compact('pedagang'));
        // $pedagang = new AdminController();
        // $firestore = $pedagang->initialize();
        // $collection = $firestore->collection('pedagang');
        // $firstQuery = $collection->orderBy('nama');
        // $pedagang = $firstQuery->documents();
        // return view('daftar-pedagang', compact('pedagang'));
    }

    public function tambahPedagang(Request $request){
        $pedagang = new AdminController();
        $firestore = $pedagang->initialize();

        $data = [
            'nama' => $request['nama'],
            'email' => $request['email'],
            'password' => $request['password'],
            'rating' => $request['rating'],
            'statusVerifikasi' => $request['statusVerifikasi'],
            'statusDagang' => $request['statusDagang'],
            'lokasi' => $firestore->geoPoint($request['latitude'], $request['longitude']) ,
            'noKTP' => $request['noKTP'],
            'noTelp' => $request['noTelp']
        ];

        $firestore->collection('pedagang')->add($data);

        return back();
    }

    public function editPedagang(Request $request){
        $pedagang = new AdminController();
        $firestore = $pedagang->initialize();
        $id = $request['id'];

        $pedagang = $firestore->collection('pedagang')->document($id);
        $pedagang->update([
            ['path' => 'nama', 'value' => $request['nama']],
            ['path' => 'email', 'value' => $request['email']],
            ['path' => 'password', 'value' => $request['password']],
            ['path' => 'rating', 'value' => $request['rating']],
            ['path' => 'statusVerifikasi', 'value' => $request['statusVerifikasi']],
            ['path' => 'statusDagang', 'value' => $request['statusDagang']],
            ['path' => 'lokasi', 'value' => $firestore->geoPoint($request['latitude'], $request['longitude'])] ,
            ['path' => 'noKTP', 'value' => $request['noKTP']],
            ['path' => 'noTelp', 'value' => $request['noTelp']]
            ]);
        return back();
    }

    public function deletePedagang(Request $request){
        $pedagang = new AdminController();
        $firestore = $pedagang->initialize();
        $id = $request['id'];
        $firestore->collection('pedagang')->document($id)->delete();
        return back();
    }

    public function showDaftarPembeliPage(){
        $pembeli = new AdminController();
        $firestore = $pembeli->initialize();
        $collection = $firestore->collection('pembeli');
        $firstQuery = $collection->orderBy('nama');
        $pembeli = $firstQuery->documents();
        return view('daftar-pembeli', compact('pembeli'));
    }

    public function tambahPembeli(Request $request){
        $pembeli = new AdminController();
        $firestore = $pembeli->initialize();

        $data = [
            'nama' => $request['nama'],
            'email' => $request['email'],
            'password' => $request['password'],
            'statusVerifikasi' => $request['statusVerifikasi'],
            'lokasi' => $firestore->geoPoint($request['latitude'], $request['longitude']) ,
            'noTelp' => $request['noTelp']
        ];

        $firestore->collection('pembeli')->add($data);

        return back();
    }

    public function editPembeli(Request $request){
        $pembeli = new AdminController();
        $firestore = $pembeli->initialize();
        $id = $request['id'];

        $pembeli = $firestore->collection('pembeli')->document($id);
        $pembeli->update([
            ['path' => 'nama', 'value' => $request['nama']],
            ['path' => 'email', 'value' => $request['email']],
            ['path' => 'password', 'value' => $request['password']],
            ['path' => 'statusVerifikasi', 'value' => $request['statusVerifikasi']],
            ['path' => 'lokasi', 'value' => $firestore->geoPoint($request['latitude'], $request['longitude'])] ,
            ['path' => 'noTelp', 'value' => $request['noTelp']]
            ]);
        return back();
    }

    public function deletePembeli(Request $request){
        $pembeli = new AdminController();
        $firestore = $pembeli->initialize();
        $id = $request['id'];
        $firestore->collection('pembeli')->document($id)->delete();
        return back();
    }
    
}
