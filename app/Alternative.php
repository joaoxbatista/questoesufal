<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    protected $fillable = ['statement', 'close_question_id'];
    public $timestamps = false;
}
