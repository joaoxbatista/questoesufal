<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answare extends Model
{
  protected $fillable = ['questionnaire_id'];

  public function closeAnswares(){
    return $this->hasMany('App\CloseAnsware');
  }

  public function openAnswares(){
    return $this->hasMany('App\OpenAnsware');
  }

  public function questionnaire(){
    return $this->belongsTo('App\Questionnaire');
  }

}
