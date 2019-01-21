@extends('layouts.app')
@section('theme')
<nav class="navbar navbar-expand-md navbar-dark navbar-laravel bg-{{$theme}}  sticky-top">    
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($results as $user)
       @if ($user->id == Auth::user()->id)
         @else
           <div class="col-md-12">
                <div class="card border-{{$theme}}">
                    <div class="card-body">
                        <p><span class="font-weight-bold h4">{{$user->Name}}</span>
                            <br>
                            <span class="h6">{{$user->Email}}</span>
                            <br>
                            <span class="h6">{{$user->Number}}</span>
                         </p>
                    </div>
                </div>
            </div>  
            @endif
        @endforeach
</div>
</div>
@endsection