<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = ['titulo', 'descricao', 'board_id', 'user_id'];

    protected $dates = ['deleted_at'];

    public function board(){
        return $this->hasMany('App\Board');
    }
    public function user(){
        return $this->hasOne('App\User');
    }

    public static function listaTasksComNomeUsuario(){
        $listaTask = DB::table('tasks')
            ->join('users', 'users.id', '=', 'tasks.user_id')
            ->select('tasks.id','tasks.titulo','tasks.descricao', 'users.name as username', 'tasks.board_id')
            ->whereNull('deleted_at');

        return $listaTask;
    }
}
