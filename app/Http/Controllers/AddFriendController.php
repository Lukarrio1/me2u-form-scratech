<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Friend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddFriendController extends Controller
{

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'friend'=>'required',
        ]);

        $info = User::find($id);
        $name = $info->name;
        $email = $info->email;
        $user_id = Auth::user()->id;
        $friend_id = $id;
        $check = DB::table('friends')->where('user_id','=',$user_id)->first();
        if( empty($check) OR $check->friend_id != $friend_id){
            $add = new Friend;
            $add->user_id = $user_id;
            $add->friend_id = $friend_id;
            $add->Name = $name;
            $add->Email = $email;
            $add->Number = 12345;
            $add->save();
            return redirect('/profile/'.$friend_id);
        }else{
            $delete = DB::table('friends')->where('friend_id','=',$friend_id)->delete();
            return  redirect('/profile/'.$friend_id);
           
        }

    }

}
