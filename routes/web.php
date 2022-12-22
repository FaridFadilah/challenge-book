<?php

use App\Http\Controllers\BukuController;
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
  Route::get('/create', 'index')->name('create');
});

Route::prefix('author')->controller(AuthorController::class)->name('author.')->group(function(){
  Route::get('/', 'index')->name('index');
  Route::get('/create', 'index')->name('create');
});
// Route::get('/');