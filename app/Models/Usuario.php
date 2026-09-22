<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tarefa;

class Usuario extends Model
{
    protected $table = 'usuario';
    protected $fillable = ['nome' ,'email'];
    public $timestamps = false;

    public function tarefas(){
        return $this->hasMany(Tarefa::class);
    }

}
