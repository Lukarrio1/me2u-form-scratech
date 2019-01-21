<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Settings;
use App\Friend;
use App\Messaging;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $color= Settings::find($user);
        if($color==null){
          $theme = "primary";
          return view('home')->with('theme',$theme);
      }else{
        $theme =$color->theme ;
        return view('home')->with('theme',$theme);
      }
    }

    public function Users(){
        $user = Auth::user()->id;
        $count = DB::table('messagings')->where('receiver_id','=',$user)->count();
        $users = user::all();
        $user = Auth::user()->id;
        $color= Settings::find($user);
        if($color==null){
          $theme = "primary";
          return view('/Users')->with('users',$users)->with('theme',$theme)->with('count',$count);
    
      }else{
        $theme =$color->theme ;
       return view('/Users')->with('users',$users)->with('theme',$theme)->with('count',$count);
      }
       
        
    }
}
