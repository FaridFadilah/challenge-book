<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller{
    public function index(){
        $author = Author::all();
        $kategori = Kategori::all();
        $bukus = Buku::all()->
        map(function($buku) use ($author, $kategori){
            $buku['author'] = $author->filter(fn($a) => $a->id == $buku->author_id)->first();
            $buku->author->makeHidden(['id', 'foto', 'email', 'deskripsi', 'created_at', 'updated_at']);

            $buku['kategori'] = $kategori->filter(fn($k) => $k->id == $buku->kategori_id)->first();
            $buku->kategori->makeHidden(['id', 'deskripsi','created_at', 'updated_at']);
            return $buku;
        });
        return response()->json([
            'status' => true,
            'data' => $bukus
        ]); 
    }
    
    public function show($id){
        $author = Author::all();
        $kategori = Kategori::all();
        $getBuku['buku'] = $buku = Buku::where('id', $id)->first();

        //show all object category in book data 
        $getBuku['getBuku']['kategori'] = $category = Kategori::where("id", $buku->kategori_id)->get();

        //show all object authors in book data 
        $getBuku['getBuku']['author'] = $author = Author::where("id", $buku->author_id)->get();
        // ->map(function($buku) use ($kategori, $author){
        //     $buku['author'] = $author->filter(fn($a) => $a->id == $buku->author_id)->first();
        //     $buku->author->makeHidden(['id', 'foto', 'email', 'deskripsi', 'created_at', 'updated_at']);

        //     $buku['kategori'] = $kategori->filter(fn($k) => $k->id == $buku->kategori_id)->first();
        //     $buku->kategori->makeHidden(['id', 'deskripsi','created_at', 'updated_at']);
        // });
        return response()->json([
            'status' => true,
            'code' => 200,
            'data' => $getBuku
        ]);
    }

    public function store(Request $request){
        $getRequest = $request->all(); 
        if(!$request->all()){
            return response()->json([
                'status' => false,
                'code' => 400,
                'message' => 'Data tidak boleh kosong',
                'data' => [],
            ]);
        }

        if($request->hasFile('foto')){
            $imgFile = $request->file('foto');
            $imgName = time() . '-' . $imgFile->hashName();
            $path = $request->getSchemeAndHttpHost() . "/foto/" . $imgName;
            $imgFile->move('foto/', $imgName);
            $getRequest['foto'] = $path;
        } else{
            $imgName = "default.jpg";
        }

        Buku::create($getRequest);
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'success',
            'data' => $getRequest
        ]);
    }

    public function update(Request $request, $id){
        $getRequest = $request->all(); // membungkus semua request kedalam variabel getRequest

        // dd($request->all());
        // die;
        
        $getBuku = Buku::where('id', $id)->first(); // mengambil data dari tabel buku berdasarkan id dari parameter

        // dd($getBuku->first()); 
        $path = parse_url($getBuku->foto);

        unlink(public_path() . $path['path']);
        // ketika foto dikirim maka buku sebelum update akan dihapus dan diganti dengan foto terbaru
        if(!$getRequest){
            return response()->json([
                'status' => false,
                'code' => 400,
                'message' => 'Data tidak boleh kosong',
                'data' => [],
            ], 400); // Jika request yang dikirim kosong maka akan mengembalikan response error
        }

        if($request->hasFile('foto')){
            $imgFile = $request->file('foto'); // untuk mengambil request yang dikirim berupa file 
            $imgName = time() . '-' . $imgFile->hashName(); // file yg telah dikirim akan diacak nama filenya sebelum disimpan di variabel getRequeast
            $path = $request->getSchemeAndHttpHost() . "/foto/" . $imgName; // nama file diacak lalu diawal sebelum nama file akan diberikan nama http host dan scheme  
            $imgFile->move('foto/', $imgName); // lalu file yang dikirim dari request akan disimpan difolder public/foto
            $getRequest['foto'] = $path; // setelah file disimpan didirektori public maka nama dari file yang direquest akan disimpan didalam variable getRequest dan nama file sebelumnya yang disimpan divariable request akan ditimpa dengan yang baru
        } else{
            $getRequest['foto'] = "default.jpg";
        }
        

        $getBuku->update($getRequest); 
        // lalu semua request yg telah dikirim disimpan database
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'success',
            'data' => $getRequest
        ]);
    }
    public function delete($id){
        $getBuku = Buku::where('id', $id)->first();
        $path = parse_url($getBuku->foto);
        unlink(public_path() . $path['path']);
        $getBuku->delete();
        return response()->json([
            'status' => true, 
            'code' => 200, 
            'message' => 'Success', 
            'data' => [], 
        ]);
    }
    public function getBukuByAuthor($nama){
        $getAuthor = Author::where('nama', $nama)->first();
        // dd($getAuthor->id);
        $getBuku = Buku::where('author_id', $getAuthor->id)->first();
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'Success',
            'data' => $getBuku,
        ]);
    }
    public function getBukuByKategori($nama){
        $getAuthor = Author::where('nama', $nama)->first();
        $getBuku = Buku::where('author_id', $getAuthor->id)->get();
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'Success',
            'data' => $getBuku,
        ]);
    }
}
