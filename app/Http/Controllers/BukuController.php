<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClients;
use Illuminate\Http\Request;

class BukuController extends Controller{
    public function index(){
        $responseBuku = HttpClients::fetch('GET', 
        'http://127.0.0.1:1234/api/buku');
        $getData = $responseBuku['data'];
        // dd($getBuku);
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
        return view('page.buku.tambah');
    }
    
    public function store(Request $request){
        HttpClients::fetch('GET', 'http://127.0.0.1:1234/api/buku', $request->all(), $request->file('foto'));
        return redirect()->route('home');
    }
    
    public function edit($id){
        $getData = HttpClients::fetch('GET', 'http://127.0.0.1:1234/api/buku/' . $id)['data'];
        return view('page.buku.tambah', $getData);
    }

    public function update(Request $request, $id){
        return view('page.buku.tambah');
    }
}