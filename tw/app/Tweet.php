<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;

class Tweet extends Model
{
    public function user(){
    	return $this->belongsTo('App\User'); 
    	//return $this->belongsTo('App\User','自分のカラム（user_id）','相手のカラムid');
    	//親がTweetで子がUSerになってる。ユーザーモデルから引っ張る
    }

    public function getUser(){
    	return $this->user->name; //userは上のメソッドを呼んでる。（）がないのは仕様	
    }
    public function likes() {
    	return $this->hasMany('App\Like','tweet_id','id');
    }


    
}
