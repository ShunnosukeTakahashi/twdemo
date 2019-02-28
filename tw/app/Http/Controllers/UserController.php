<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Follow;


class UserController extends Controller
{
	public function index(){

        //ログイン者のフォロー情報取得
    	$follows = Follow::where('user_id', '=' ,Auth::id())->get(); //第一引数はカラムの名前 
    	//follow_idを配列に入れる
    	$followIds = [];
    	
    	foreach ($follows as $follow) {
    		$followIds[] =  $follow->follow_id;
    	}
    	$user = User::where('id' , '!=' ,Auth::id())->get(); //whereは条件を示しただけ、欲しかったらget使う
        $user = User::paginate(10);
    	return view('user.list' , ['users'=>$user , 'followIds'=>$followIds]);
    }

    
    public function follow($follow_id){ //Postでやってみる（Requestのやつ）、現在はパスパラ
    	//dd(Auth::id()) フォローする人のid
    	//DD($follow_id) フォローされる人のid
    	$follow = new Follow;
    	$follow->user_id = Auth::id();
    	$follow->follow_id = $follow_id;
    	$follow -> save();
    	return redirect('/users');
    }


    public function remove($follow_id){

        $remId = Follow::where('user_id' , '=' , Auth::id())->where('follow_id' , '=' ,$follow_id);
        $remId->delete();

        return redirect('/users');
    }


    public function deleteData()
    {
        $user = User::find(Auth::id());
        $user->delete();

        return redirect('/register');
    }
    
}
