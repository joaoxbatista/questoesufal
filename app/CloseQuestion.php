<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CloseQuestion extends Model
{
    protected $fillable = ['statement', 'comments', 'user_id'];
	public $timestamps = false;
}
