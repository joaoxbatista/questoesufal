<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CloseAnsware extends Model
{
    protected $fillable = ['answare_id', 'close_question_id', 'alternative_id'];
    public $timestamps = false;

    public function closeQuestion(){
      return $this->belongsTo('App\CloseQuestion');
    }

    public function alternative(){
      return $this->belongsTo('App\Alternative');
    }
}
