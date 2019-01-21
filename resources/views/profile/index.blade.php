@extends('layouts.app')
@section('theme')
<nav class="navbar navbar-expand-md navbar-dark navbar-laravel bg-{{$theme}}  sticky-top">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                 {{$f_count}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection