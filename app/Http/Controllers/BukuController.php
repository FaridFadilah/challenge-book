<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller{
    public function index(){
        return response()->json([
            'status' => true,
            'data' => Buku::get()
        ]);
    }
    public function store(Request $request){
        if(!$request->all()){
            return response()->json([
                'status' => false,
                'code' => 400,
                'message' => 'Data tidak boleh kosong',
                'data' => [],
            ]);
        }
        DB::table('authors')->insert($request->all());

        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'success',
            'data' => $request->all()
        ]);
    }

    public function update(Request $request){
        if(!$request->all()){
            return response()->json([
                'status' => false,
                'code' => 400,
                'message' => 'Data tidak boleh kosong',
                'data' => [],
            ]);
        }
        DB::table('authors')->insert($request->all());

        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'success',
            'data' => $request->all()
        ]);
    }
}
