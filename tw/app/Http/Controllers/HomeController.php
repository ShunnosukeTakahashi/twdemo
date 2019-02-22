<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tweet;
use App\Follow;

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
        $follows = Follow::where('user_id', '=' ,Auth::id())->get(); 
        $followIds = [];
        foreach ($follows as $follow) {
            $followIds[] =  $follow->follow_id;
        }
        $followIds[] = Auth::id();

        $tweets = Tweet::whereIn('user_id' , $followIds)->orderBy('created_at' , 'desc')->get();
        
        
        return view('home',['tweets'=>$tweets]);
    }
}