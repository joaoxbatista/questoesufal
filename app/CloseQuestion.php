<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CloseQuestion extends Model
{
    protected $fillable = ['statement', 'comments', 'user_id', 'questionnaire_id'];
	public $timestamps = false;

	public function alternatives(){
		return $this->hasMany('App\Alternative');
	}
}
