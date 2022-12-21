<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\KategoriController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', fn() => response()->json([
    'status' => true,
    'code' => 200,
    'message' => 'server running in port 8000',
]));

Route::prefix('kategori')->name('kategori.')->controller(KategoriController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'delete')->name('delete');
});
Route::prefix('buku')->name('buku.')->controller(BukuController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/author/{nama}', 'getBukuByAuthor')->name('getBukuByAuthor');
    Route::get('/kategori/{nama}', 'getBukuByKategori')->name('getBukuByKategori');
    Route::post('/', 'store')->name('store');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'delete')->name('delete');
});
// Route::resource('buku', BukuController::class);
Route::prefix('author')->name('author.')->controller(AuthorController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'delete')->name('delete');
});