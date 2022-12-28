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
        $getRequest = $request->all();        
        
        if($request->file() != null){
            $files = ['foto' => $request->file('foto')];
        } else{
            $files = $request->file();
        }

        HttpClients::fetch('POST', 'http://localhost:1234/api/author', $getRequest, $files);
        // dd($request->all());
        return redirect()->route('author.index');
    }

    public function edit($id){
        $responseAuthor = HttpClients::fetch('GET', 'http://localhost:1234/api/author/' . $id);
        $getData = $responseAuthor['data'];
        return view('page.author.edit', compact('getData'));
    }

    public function update(Request $request, $id){
        $getRequest = $request->all();        

        if($request->file() != null){
            $files = ['foto' => $request->file('foto')];
        } else{
            $files = $request->file();
        }
        HttpClients::fetch('PUT', 'http://localhost:1234/api/author/' . $id . '/update', $getRequest, $files);
        return redirect()->route('home');
    }
    
    public function delete($id){
        HttpClients::fetch('DELETE', 'http://localhost:1234/api/author/' . $id . '/delete');
        return redirect()->route('home');
    }
}