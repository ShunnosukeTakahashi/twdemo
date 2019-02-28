<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tweet;
use App\Follow;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); //ろぐいんしていないと閲覧できないよの制御
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_tweet = User::find(Auth::id());
        $count = count($user_tweet->tweets);
        //dd($count);


        $follows = Follow::where('user_id', '=' ,Auth::id())->get(); 
        $followIds = [];
        foreach ($follows as $follow) {
            $followIds[] =  $follow->follow_id;
        }
        $followIds[] = Auth::id();

        $tweets = Tweet::whereIn('user_id' , $followIds)->orderBy('created_at' , 'desc')->get();
        $tweets = Tweet::latest()->paginate(10);
        return view('home',['tweets'=>$tweets]);
    }
}