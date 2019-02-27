<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tweet;

class TweetController extends Controller
{
  public function update(Request $request) {

      //ログイン中のユーザーのid を取得
      //dd(Auth::id());

    return redirect()->route('home');
  }

  public function store(Request $request){

    // DB保存
     $tweet = new Tweet;
    	$tweet->tweet = $request->tweet; //postのname=tweetになってる
    	$tweet->user_id = Auth::id();
      //tweet->image = "images/photos/img_{$tweet->id}.jpg";
    	$tweet -> save();
      //$tweet->id; 
      $tweet->image = "images/photos/img_{$tweet->id}.jpg";
      $tweet -> save();
      // 画像の保存
      if(isset($tweet->image)){

      }else{
      $request->file('image')->move(base_path() . '/public/images/photos', "img_{$tweet->id}.jpg");
    }

      return redirect('home');
    }

    public function delete($id)
    {
        $tweet = tweet::findOrFail($id);
        $tweet->delete($id);
      
        return redirect('home');
    }

  }
