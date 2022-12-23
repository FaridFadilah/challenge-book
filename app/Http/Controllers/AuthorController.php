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
    public function create(){
        return view('page.author.tambah');
    }
    
    public function store(Request $request){
        HttpClients::fetch('POST', 'http://localhost:1234/api/author', $request->all(), $request->file('foto'));
        // dd($request->all());
        return redirect()->route('author.index');
    }

    public function edit($id){
        $responseAuthor = HttpClients::fetch('GET', 'http://localhost:1234/api/author' . $id);
        $getData = $responseAuthor['data'];
        return redirect()->route('author.edit', compact('getData'));
    }

    public function update(){

    }
}
