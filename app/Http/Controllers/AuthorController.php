<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Buku;
use Illuminate\Http\Request;

class AuthorController extends Controller{
  public function index(){
    $getData = Author::all();
    if(!$getData) return response()->json([
      'status' => true,
      'code' => 404,
      'message' => 'Data not found',
      'data' => []
    ]);
    return response()->json([
      'status' => true,
      'code' => 200,
      'message' => 'Success',
      'data' => $getData
    ]);
  }

  public function getBukuByAuthor(){
    $getBuku = Buku::all();
    $getAuthor = Author::all()->map(function($author) use ($getBuku){
    $author['buku'] = $getBuku->filter(fn($a) => $a->id == $author->id)->makeHidden(['id', 'deskripsi']);
    return $author;
  });

    return response()->json([
      'data' => $getAuthor 
    ]);
  }
  public function show($id){
    return response()->json([
      'status' => true,
      'code' => 200,
      'message' => 'success',
      'data' => Author::where('id',$id)->first()
    ]);
  }

  public function store(Request $request){
    $getAllRequest = $request->all();
    
    if($request->hasFile('foto')){
      $imgFile = $request->file('foto');
      $imgName = time() . '-' . $imgFile->hashName();
      $path = $request->getSchemeAndHttpHost() . "/foto/" . $imgName;
      $imgFile->move('foto/', $imgName);
      $getAllRequest['foto'] = $path;
    } else{
      $imgName = "default.jpg";
    }

    // dd($getAllRequest['img']);
    Author::create($getAllRequest);
    return response()->json([
      'status' => true,
      'code' => 200,
      'message' => 'success',
      'data' => $getAllRequest
    ]);
  }

  public function update(Request $request, $id){
    $getAllRequest = $request->all(); // membungkus semua request kedalam variabel getAllRequest
    $getAuthors = Author::where('id', $id); // mengambil data author berdasarkan id yg diberikan dari parameter

    $path = parse_url($getAuthors->first()->foto);
    unlink(public_path() . $path['path']); // ketika foto dikirim maka foto sebelum update akan dihapus dan diganti dengan foto terbaru
    if($request->hasFile('foto')){ 
      $imgFile = $request->file('foto'); // untuk mengambil request yang dikirim berupa file 
      $imgName = time() . '-' . $imgFile->hashName(); 
      // file yg telah dikirim akan diacak nama filenya sebelum disimpan di variabel getRequeast
      $path = $request->getSchemeAndHttpHost() . "/foto/" . $imgName; // nama file diacak lalu diawal sebelum nama file akan diberikan nama http host dan scheme 
      $imgFile->move('foto/', $imgName); // lalu file yang dikirim dari request akan disimpan difolder public/foto
      $getAllRequest['foto'] = $path; // setelah file disimpan didirektori public maka nama dari file yang direquest akan disimpan didalam variable getRequest dan nama file sebelumnya yang disimpan divariable request akan ditimpa dengan yang baru
    } else{
      $imgName = "default.jpg";
    }

    $getAuthors->update($getAllRequest); 
    // lalu semua request yg telah dikirim disimpan database
    return response()->json([
      'status' => true,
      'code' => 200,
      'data' => $getAllRequest,
    ]);
  }

  public function delete($id){
    $getData = Author::where('id', $id)->first();

    $path = parse_url($getData->foto);
    unlink(public_path() . $path['path']);
    $getData->delete();
    return response()->json([
      'status' => true,
      'code' => 200,
      'message' => 'success',
      'data' => []
    ], 200);
  }
}
