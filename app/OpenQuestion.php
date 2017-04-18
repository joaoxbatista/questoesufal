<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenQuestion extends Model
{
	protected $fillable = ['statement', 'comments', 'user_id', 'questionnaire_id'];
	public $timestamps = false;
}
