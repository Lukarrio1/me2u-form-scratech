@extends('layouts.app')
@section('theme')
<nav class="navbar navbar-expand-md navbar-dark navbar-laravel bg-{{$theme}}  sticky-top">    
@endsection
@section('inbox_count')
{{$count}}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($users as $user)
       @if ($user->id == Auth::user()->id)
         @else
           <div class="col-md-12 pb-2">
                <div class="card border-{{$theme}} ">
                    <div class="card-body">
                        <p class="pl-4"><span class="font-weight-bold h4">{{$user->name}}</span><br>
                            <span>{{$user->email}}</span>
                         </p>
                       <div class="pl-3"> &nbsp;<a href="profile/{{$user->id}}" class="btn btn-{{$theme}} ">View</a></div>  
                    </div>
                </div>
            </div>  
       @endif
        @endforeach
</div>
</div>
@endsection