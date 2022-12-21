<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    
    if($request->hasFile('img')){
      $imgFile = $request->file('img');
      $imgName = time() . '-' . $imgFile->hashName();
      $path = $request->getSchemeAndHttpHost() . "/img/" . $imgName;
      $imgFile->move('img/', $imgName);
      $getAllRequest['img'] = $path;
    } else{
      $imgName = "default.jpg";
    }

    Author::create($getAllRequest);
    return response()->json([
      'status' => true,
      'code' => 200,
      'message' => 'success',
      'data' => $request->all()
    ]);
  }

  public function delete($id){
    Author::where('id', $id)->delete();
    return response()->json([
      'status' => true,
      'code' => 200,
      'message' => 'success',
      'data' => []
    ]);
  }
}
