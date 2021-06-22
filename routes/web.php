<?php

use App\Http\Controllers\Admin\Berita;
use App\Http\Controllers\Admin\Cms;
use App\Http\Controllers\Admin\File;
use App\Http\Controllers\Admin\Foto;
use App\Http\Controllers\Admin\Index;
use App\Http\Controllers\Admin\Konten;
use App\Http\Controllers\Admin\Tag;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin', [Index::class, 'index']);
Route::get('/konten', [Konten::class, 'index']);
Route::get('/berita', [Berita::class, 'index']);
Route::get('/tag', [Tag::class, 'index']);
Route::get('/cms', [Cms::class, 'index']);
Route::get('/foto', [Foto::class, 'index']);
Route::get('/file', [File::class, 'index']);
Route::get('/Konten/getdata', [Konten::class, 'getdata']);
Route::post('/Konten/addkonten', [Konten::class, 'addkonten']);
Route::get('/Konten/editdata/{id_konten}', [Konten::class, 'editdata']);
Route::post('/Konten/updatedata/{id_konten}', [Konten::class, 'updatedata']);
Route::get('/Konten/hapusdata/{id_konten}', [Konten::class, 'hapusdata']);
Route::get('/Tag/alldata', [Tag::class, 'alldata']);
Route::post('/Tag/adddata', [Tag::class, 'adddata']);
Route::get('/Tag/hapusdata/{id_tag}', [Tag::class, 'hapusdata']);
Route::get('/Tag/editdata/{id_tag}', [Tag::class, 'editdata']);
Route::post('/Tag/updatedata/{id_tag}', [Tag::class, 'updatedata']);
Route::get('/cms/alldata', [Cms::class, 'alldata']);
Route::post('/cms/editlg/{id_lg}', [Cms::class, 'editlg']);
Route::post('/berita/tambahberita', [Berita::class, 'tambahberita']);
Route::get('/berita/showberita', [Berita::class, 'showberita']);
Route::get('/berita/hapusberita/{id_berita}', [Berita::class, 'hapusberita']);
Route::get('/berita/editberita/{id_berita}', [Berita::class, 'editberita']);
