<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClients;
use Illuminate\Http\Request;

class BukuController extends Controller{
    public function index(){
        $responseBuku = HttpClients::fetch('GET', 
        'http://127.0.0.1:1234/api/buku');
        $getData = $responseBuku['data'];
        // dd($responseBuku);
        // die;
        return view('page.buku.index', compact('getData'));
    }

    public function show($id){
        $responseBuku = HttpClients::fetch('GET', 
        'http://127.0.0.1:1234/api/buku/' . $id);
        $getData = $responseBuku['data'];
        // dd($getBuku);
        return view('page.buku.index', compact('getData'));
    }

    public function create(){
        $responseAuthor = HttpClients::fetch('GET', 'http://127.0.0.1:1234/api/author');
        $responseKategori = HttpClients::fetch('GET', 'http://127.0.0.1:1234/api/kategori');
        $getAuthor = $responseAuthor['data'];
        $getKategori = $responseKategori['data'];
        return view('page.buku.tambah', compact('getAuthor', 'getKategori'));
    }

    public function store(Request $request){
        $getRequest = $request->all();        
        
        if($request->file() != null){
            $files = ['foto' => $request->file('foto')];
        } else{
            $files = $request->file();
        }
        // dd($request->all(), $files);
        $response = HttpClients::fetch('POST', 'http://127.0.0.1:1234/api/buku', $getRequest, $files);
        // dd($getRequest);
        return redirect()->route('home');
    }
    
    public function edit($id){
        $responseData = HttpClients::fetch('GET', 'http://127.0.0.1:1234/api/buku/' . $id);
        $responseAuthor = HttpClients::fetch('GET', 'http://127.0.0.1:1234/api/author');
        $responseKategori = HttpClients::fetch('GET', 'http://127.0.0.1:1234/api/kategori');
        $getAuthor = $responseAuthor['data'];
        $getData = $responseData['data']['buku'];
        // dd($getData);
        // die;
        $getKategori = $responseKategori['data'];
        return view('page.buku.edit', compact('getAuthor','getData',  'getKategori'));
    }

    public function update(Request $request, $id){
        $getRequest = $request->all();        
        // dd($getRequest);
        // die;
        if($request->file() != null){
            $files = ['foto' => $request->file('foto')];
        } else{
            $files = $request->file();
        }
        // dd($request->all(), $files);
        $response = HttpClients::fetch('PUT', 'http://127.0.0.1:1234/api/buku/' . $id . '/update', $getRequest, $files);
        return redirect()->route('home');
    }

    public function delete($id){
        HttpClients::fetch('DELETE', 'http://127.0.0.1:1234/api/buku/' . $id . '/delete');
        return redirect()->route('home');
    }
}