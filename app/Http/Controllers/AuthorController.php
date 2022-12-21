<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller{
    public function index(){
      return response()->json([
        'status' => true,
        'code' => 200,
        'message' => 'Success',
        'data' => DB::table('authors')->get()
      ]);
    }
}
