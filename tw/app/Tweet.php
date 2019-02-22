<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    public function user(){
    	return $this->belongsTo('App\User'); //親がTweetで子がUSerになってる。ユーザーモデルから引っ張る
    }

    public function getUser(){
    	return $this->user->name; //userは上のメソッドを呼んでる。（）がないのは仕様	
    }
}
