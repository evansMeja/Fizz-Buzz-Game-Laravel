<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'scores';
	public $primaryKey = 'id';
	public $timestamps = true;
	
	public function user(){
        return $this->belongsTo('App\User');
    }
}
 