<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use SoftDeletes;

    protected $fillable = ['titulo'];

    protected $dates = ['deleted_at'];

    public function task(){
        return $this->belongsTo('App\Task');
    }
}
