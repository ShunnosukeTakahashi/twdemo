<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tweet;

class TweetController extends Controller
{
    public function update(Request $request) {

      //ログイン中のユーザーのid を取得
      dd(Auth::id());

      return redirect()->route('home');
  	}

    public function store(Request $request){
    	$tweet = new Tweet;
    	$tweet->tweet = $request->tweet;
    	$tweet->user_id = Auth::id();
    	$tweet -> save();
    	return redirect('home');
    	
    }
}
