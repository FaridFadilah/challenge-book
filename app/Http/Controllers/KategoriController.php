<?php
namespace App\Http\Controllers;

use App\Helpers\HttpClients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KategoriController extends Controller{
    public function index(){
        $responseAuthor = HttpClients::fetch('GET', 'http://localhost:1234/api/kategori');
        $getData = $responseAuthor['data'];
        return view('page.kategori.index', compact('getData'));
    }

    public function create(){
        return view('page.kategori.tambah');
    }

    public function store(Request $request){
        // Http::post('http://localhost:1234/api/kategori', $request->all());
        HttpClients::fetch('POST', 'http://localhost:1234/api/kategori', $request->all(), $request->file('foto'));
        return redirect()->route('kategori.index');
    }

    public function edit($id){
        $response = HttpClients::fetch('GET', 'http://localhost:1234/api/kategori/' . $id);
        $getData = $response['data'];
        return view('page.kategori.edit', compact('getData'));
    }

    public function update(Request $request, $id){
        HttpClients::fetch('PUT', 'http://localhost:1234/api/kategori/' . $id, $request->all());
        return redirect()->route('kategori.index');
    }

    public function delete($id){
        HttpClients::fetch('DELETE', 'http://localhost:1234/api/kategori/'. $id);
        return redirect()->route('kategori.index');
    }
}