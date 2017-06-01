<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CloseAnsware extends Model
{
    protected $fillable = ['answare_id', 'close_question_id', 'alternative_id'];
    public $timestamps = false;
}
