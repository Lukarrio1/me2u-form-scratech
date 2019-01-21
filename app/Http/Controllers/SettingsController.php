<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $user = $id;
        $color= Settings::find($user);
        if($color==null){
          $theme = "primary";
          return view('settings.edit')->with('id',$id)->with('theme',$theme);
      }else{
       $theme=$color->theme ;
       return view('settings.edit')->with('id',$id)->with('theme',$theme);
      }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { $this ->validate($request,[
     'theme' => 'required',
    ]);
    $theme = $request->input('theme');
        if(Settings::find($id)){
            $settings = Settings::find($id);
            $settings->theme = $theme;
            $settings->save();
            return redirect('settings/'.$id.'/edit');
        }else{
            $settings = new Settings;
            $settings->theme = $theme;
            $settings -> save();
            return redirect('settings/'.$id.'/edit');
        }
    }
}
