<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friend;
use App\Settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $search= $request->input('Search');
        $results = DB::table('friends')->where('Name','LIKE','%'.$search.'%')
        ->orWhere('Email','LIKE','%'.$search.'%')
        ->orWhere('Number','LIKE','%'.$search.'%')
        ->orderby('created_at','desc')->get();
        
        $user = Auth::user()->id;
        $color= Settings::find($user);
        if($color==null){
          $theme = "primary";
          return view('Search.Result')->with('results',$results)->with('theme',$theme);
      }else{
        $theme =$color->theme ;
        return view('Search.Result')->with('results',$results)->with('theme',$theme);
      }
        
    }

   
}
