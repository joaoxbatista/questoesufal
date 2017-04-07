<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = ['title', 'ini_date', 'end_date', 'description', 'user_id'];
    public $timestamps = false;
}
