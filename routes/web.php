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

use App\Task;
use App\Board;
use App\User;

Route::get('/', function () {

    $listaBoard = Board::select('id','titulo')->get();
    $listaTask = Task::select('id','titulo', 'descricao', 'board_id', 'user_id')
        ->join('users', 'users.id', '=', 'tasks.user_id')
        ->select('tasks.id','tasks.titulo','tasks.descricao', 'users.name as username', 'tasks.board_id', 'tasks.user_id')
        ->get();
    $listaUsuarios = User::select('id','name')->get();
    return view('site', compact('listaBoard', 'listaTask', 'listaUsuarios'));
})->name('site');

Route::get('/artigo/{id}/{titulo?}', function ($id) {
    $artigo = Artigo::find($id);
    if($id){
        return view('artigo', compact('artigo'));
    }

    return redirect()->route('site');

})->name('artigo');

Auth::routes();
Route::middleware(['auth'])->group(function(){

    Route::resource('task', 'TaskController')->middleware('auth');
    Route::resource('board', 'BoardController')->middleware('auth');

});

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('can:autor');


Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(function(){

  Route::resource('artigos', 'ArtigosController')->middleware('can:autor');
  Route::resource('usuarios', 'UsuariosController')->middleware('can:admin');
  Route::resource('autores', 'AutoresController')->middleware('can:admin');
  Route::resource('adm', 'AdminController')->middleware('can:admin');

});
