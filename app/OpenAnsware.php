<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenAnsware extends Model
{
   protected $fillable = ['answare_id', 'value', 'open_question_id'];
   public $timestamps = false;
}
