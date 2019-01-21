<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use Illuminate\Support\Facades\Auth;
class PagesController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(){
      $user = Auth::user()->id;
      $color= Settings::find($user);
      if($color==null){
        $theme = "primary";
        return view('index')->with('theme',$theme);
    }else{
         $theme=$color->theme;
      return view('index')->with('theme',$theme);
    }
  }
}
