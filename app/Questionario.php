<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionario extends Model
{
    protected $fillable = ['titulo', 'data_ini', 'data_fim', 'pontuacao', 'descricacao'];
    public $timestamps = false;
}
