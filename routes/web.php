<?php

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

use App\Artigo;

Route::get('/', function () {
    $lista = Artigo::listaArtigosSite(3);
    return view('site', compact('lista'));
})->name('site');

Route::get('/artigo/{id}/{titulo?}', function ($id) {
    $artigo = Artigo::find($id);
    if($id){
        return view('artigo', compact('artigo'));
    }

    return redirect()->route('site');

})->name('artigo');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('can:autor');

Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(function(){

  Route::resource('artigos', 'ArtigosController')->middleware('can:autor');
  Route::resource('usuarios', 'UsuariosController')->middleware('can:admin');
  Route::resource('autores', 'AutoresController')->middleware('can:admin');
  Route::resource('adm', 'AdminController')->middleware('can:admin');

});
