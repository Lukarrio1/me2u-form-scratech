<?php

namespace App\Http\Controllers;
use App\User;
Use App\Friend;
use App\Settings;
use App\Messaging;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MessagingController extends Controller
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
        $messages = DB::table('messagings')
        ->where('receiver_id','=',$user)
        ->orderBy('created_at', 'desc')
        ->get();
        $specific =DB::table('messagings')
        ->where('');
        $count = DB::table('messagings')
        ->where('receiver_id','=',$user)
        ->count();
        if($color==null){
          $theme = "primary";
          return view('messaging.index')->with('theme',$theme)->with('messages',$messages)->with('count',$count);
          }else{
        $theme =$color->theme;
        return view('messaging.index')->with('theme',$theme)->with('messages',$messages)->with('count',$count);
      }
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->id;
        $color= Settings::find($user);
        if($color==null){
          $theme = "primary";
          return view('messaging.create')->with('theme',$theme);
          }else{
        $theme =$color->theme;
        return view('messaging.create')->with('theme',$theme);
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $this->validate($request,[
            'user_id'=>'required|integer',
            'message' => 'required|max:140'
        ]);
        $new_message = new Messaging;
        $user = Auth::user()->id;
        $user_name = Auth::user()->name;
        $message = $request->input('message');
        $user_id = $request->input('user_id');
        $receiver =DB::table('friends')->where('friend_id','=',$user_id)->first();
        $new_message->sender_id = $user;
        $new_message->receiver_id = $user_id;
        $new_message->message = $message;
        $new_message->sender_name = $user_name;
        $new_message->receiver_name= $receiver->Name;
        $new_message->save();
        return redirect('/messaging');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function send($id){
        $user_id =$id;
        $user = Auth::user()->id;
        $color= Settings::find($user);
        if($color==null){
          $theme = "primary";
          return view('messaging.send')->with('theme',$theme)->with('user_id',$user_id);
          }else{
        $theme =$color->theme;
        return view('messaging.send')->with('theme',$theme)->with('user_id',$user_id);
      }
       
    }
    public function sent(){
        $user = Auth::user()->id;
        $color= Settings::find($user);
        $messages = DB::table('messagings')->where('sender_id','=',$user)->get();
        $count = DB::table('messagings')->where('receiver_id','=',$user)->count();
        if($color==null){
          $theme = "primary";
          return view('messaging.sent')->with('theme',$theme)->with('messages',$messages)->with('count',$count);
          }else{
        $theme =$color->theme;
        return view('messaging.sent')->with('theme',$theme)->with('messages',$messages)->with('count',$count);
      }
       
    }
}
