<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', fn() => view('page.index'))->name('home');
Route::prefix('buku')->controller(BukuController::class)->name('buku.')->group(function(){
  Route::get('/', 'index')->name('index');
  Route::get('/create', 'create')->name('create');
  Route::post('/create', 'store')->name('store');
  Route::get('/{id}/edit', 'edit')->name('edit');
  Route::put('/{id}/update', 'update')->name('update');
  Route::delete('/{id}/delete', 'delete')->name('delete');
});

Route::prefix('author')
  ->controller(AuthorController::class)
  ->name('author.')
  ->group(function(){
  Route::get('/', 'index')->name('index');
  Route::get('/create', 'create')->name('create');
  Route::post('/create', 'store')->name('store');
  Route::get('/{id}/edit', 'edit')->name('edit');
  Route::put('/{id}/update', 'update')->name('update');
  Route::delete('/{id}/delete', 'delete')->name('delete');
});

Route::prefix('kategori')->controller(KategoriController::class)->name('kategori.')->group(function(){
  Route::get('/', 'index')->name('index');
  Route::get('/create', 'create')->name('create');
  Route::post('/create', 'store')->name('store');
  Route::get('/{id}/edit', 'edit')->name('edit');
  Route::put('/{id}/update', 'update')->name('update');
  Route::delete('/{id}/delete', 'delete')->name('delete');
});