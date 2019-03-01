<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Like;

class LikeController extends Controller
{
    public function like(Request $request){
    	$like = new Like;
    	$like->user_id = Auth::id();
    	$like->tweet_id = $request->input('tweet_id');
    	$like->save();
    	
    	return redirect('home');
    }

    public function dislike(Request $request){
    	$dislikeId = Like::where('tweet_id' , $request->tweet_id)->where('user_id' , Auth::id());
		$dislikeId->delete();

    	return redirect('home');
    }
}