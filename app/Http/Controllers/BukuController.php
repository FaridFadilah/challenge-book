<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClients;
use Illuminate\Http\Request;

class BukuController extends Controller{
    public function index(){
        $responseBuku = HttpClients::fetch('GET', 
        'http://127.0.0.1:1234/api/buku');
        $getBuku = $responseBuku['data'];
        // dd($getBuku);
        return view('page.buku.index', compact('getBuku'));
    }

    public function create(Request $request){
        $responseBuuk = HttpClients::fetch('GET', 'http://127.0.0.1:1234/api/buku', $request->all());
        // $request-> = 
    }
}