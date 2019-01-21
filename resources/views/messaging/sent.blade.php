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
@foreach ($messages as $message)
<div class="col-md-10 pt-3">
    <div class="card border-{{$theme}}">
        <div class="card-body border-{{$theme}}">
            <p ><span class="font-weight-bold h4">{{$message->receiver_name}}</span><br>
             <span>{{$message->message}}</span>&nbsp;
             <span>{{date('M j, Y h:ia', strtotime($message->created_at))}}</span>
            </p>
        </div>
    </div>
</div>
@endforeach
</div>
</div>

@endsection
