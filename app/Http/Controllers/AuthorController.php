<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClients;
use Illuminate\Http\Request;

class AuthorController extends Controller{
    public function index(){
        $responseAuthor = HttpClients::fetch('GET', 'http://localhost:1234/api/author');
        $getData = $responseAuthor['data'];
        return view('page.author.index', compact('getData'));
    }
}
