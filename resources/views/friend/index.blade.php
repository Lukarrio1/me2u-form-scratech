@extends('layouts.app')
@section('theme')
<nav class="navbar navbar-expand-md navbar-dark navbar-laravel bg-{{$theme}} sticky-top">    
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        @foreach ($all_friends as $user)
           <div class="col-md-12 pb-2">
                <div class="card border-{{$theme}}">
                    <div class="card-body ">
                        <p class="pl-4"><span class="font-weight-bold h4">{{$user->Name}}</span><br>
                            <span>{{$user->Email}}</span><br>
                            <span>{{$user->Number}}</span>
                         </p>
                       <div class="pl-3">&nbsp;<a href="profile/{{$user->friend_id}}" class="btn btn-{{$theme}} ">View</a>
                        &nbsp;<a href="send/{{$user->friend_id}}" class="btn btn-{{$theme}} ">Message</a></div>  
                     
                    </div>
                </div>
            </div>  
        @endforeach
</div>
</div>
@endsection