<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller{
    public function index(){
        if(!Kategori::all()){
            return response()->json([
                'status' => true,
                'code' => 404,
                'message' => 'Not found',
                "data" => []
            ]);
        }
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'Success',
            "data" => Kategori::all()
        ]);
    }

    public function store(Request $request){
        Kategori::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);

        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'Success',
            "data" => $request->all()
        ]);
    }
    public function update(Request $request, $id){
        Kategori::where('id', $id)->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);

        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'Success',
            "data" => $request->all()
        ]);
    }

    public function show($id){
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'Success',
            "data" => Kategori::where('id', $id)->first()
        ]);
    }
    public function delete($id){
        Kategori::where('id', $id)->delete();
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'Deleted Success',
        ]);
    }
}