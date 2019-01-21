@extends('layouts.index')
@section('theme')
<nav class="navbar navbar-expand-md navbar-dark navbar-laravel bg-{{$theme}}  sticky-top">
@endsection
@section('title')
ME2U
@endsection
@section('active')
<div class="col-md-12 pt-3">
<div class="card">
    <div class="card-body">
        hello there this is the check if the card is working with the correct dementions 
    </div>
</div>
</div>
@endsection

@section('body')
<div class="col-md-12 pt-3">
    <div class="card">
        <div class="card-body">
            <p>Lorem, ipsum. <br>
             <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corrupti, tenetur.</span>
            </p>
          
        </div>
    </div>
</div>
@endsection
