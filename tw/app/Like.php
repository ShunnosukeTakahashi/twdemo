<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tweet;
use App\User;

class Like extends Model
{
   protected $fillable = [
   		'user_id' , 'tweet_id',
   ];

   public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function tweets(){
    	return $this->hasMany('App\Tweet','tweet_id','id');
    }
}
