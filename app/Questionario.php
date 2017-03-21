<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionario extends Model
{
    protected $fillable = ['titulo', 'data_ini', 'data_fim', 'pontuacao', 'descricao', 'user_id'];
    public $timestamps = false;
}
