<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller{
    public function index(){
        return response()->json([
            'status' => true,
            'data' => Buku::all()
        ]);
    }
    public function store(Request $request){
        $getRequest = $request->all();
        if(!$request->all()){
            return response()->json([
                'status' => false,
                'code' => 400,
                'message' => 'Data tidak boleh kosong',
                'data' => [],
            ]);
        }

        if($request->hasFile('foto')){
            $imgFile = $request->file('foto');
            $imgName = time() . '-' . $imgFile->hashName();
            $path = $request->getSchemeAndHttpHost() . "/foto/" . $imgName;
            $imgFile->move('foto/', $imgName);
            $getRequest['foto'] = $path;
        } else{
            $imgName = "default.jpg";
        }

        Buku::create($getRequest);
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'success',
            'data' => $getRequest
        ]);
    }

    public function update(Request $request, $id){
        $getRequest = $request->all();
        $imgOld = Buku::where('id', $id)->first();
        dd($getRequest);
        if(!$getRequest){
            return response()->json([
                'status' => false,
                'code' => 400,
                'message' => 'Data tidak boleh kosong',
                'data' => [],
            ], 400);
        }

        unlink(public_path($imgOld));
        if($request->hasFile('foto')){
            $imgFile = $request->file('foto');
            $imgName = time() . '-' . $imgFile->hashName();
            $path = $request->getSchemeAndHttpHost() . "/foto/" . $imgName;
            $imgFile->move('foto/', $imgName);
            $getRequest['foto'] = $path;
        } else{
            $getRequest['foto'] = "default.jpg";
        }

        Buku::where('id', $id)->update($getRequest);
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'success',
            'data' => $getRequest
        ]);
    }
    public function delete($id){
        $getBuku = Buku::where('id', $id)->first();
        unlink(public_path('img/' . $getBuku->foto));
        $getBuku->delete();
        return response()->json([
            'status' => true, 
            'code' => 200, 
            'message' => 'Success', 
            'data' => [], 
        ]);
    }
    public function getBukuByAuthor($nama){
        $getAuthor = Author::where('nama', $nama)->first();
        // dd($getAuthor->id);
        $getBuku = Buku::where('author_id', $getAuthor->id)->first();
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'Success',
            'data' => $getBuku,
        ]);
    }
    public function getBukuByKategori($nama){
        $getAuthor = Author::where('nama', $nama)->first();
        $getBuku = Buku::where('author_id', $getAuthor->id)->get();
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'Success',
            'data' => $getBuku,
        ]);
    }
}
