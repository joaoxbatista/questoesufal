<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    protected $fillable = ['statement', 'correct', 'close_question_id'];
    public $timestamps = false;
}
