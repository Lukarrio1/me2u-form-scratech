<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Settings;
use App\User;
use App\Friend;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $color= Settings::find($user);
        $f_count = DB::table('friends')->where('user_id','=',$user)->count();
        $profile= DB::table('users')->where('id','=',$user)->first();
        if($color==null){
          $theme = "primary";
        return view('profile.index')
        ->with('theme',$theme)
        ->with('f_count',$f_count)
        ->with('profile',$profile);
;
      }else{
        $theme =$color->theme;
       return view('profile.index')
       ->with('theme',$theme)
       ->with('profile',$profile)
       ->with('f_count',$f_count);
      }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = User::find($id);
        $user = Auth::user()->id;
        $color= Settings::find($user);
        $friend = DB::table('friends')->where('friend_id','=',$show->id)->first();
        $count = DB::table('messagings')->where('receiver_id','=',$user)->count();
        if($color==null){
          $theme = "primary";
         return view('profile.show')->with('theme',$theme)->with('show',$show)->with('friend',$friend)->with('count',$count);
      }else{
        $theme =$color->theme;
       return view('profile.show')->with('theme',$theme)->with('show',$show)->with('friend',$friend)->with('count',$count);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
