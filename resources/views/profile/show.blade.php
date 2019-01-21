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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p class="pl-4"><span class="font-weight-bold h4">{{$show->name}}</span><br>
                            <span>{{$show->email}}</span>
                        </p>
                        <div class="pl-3">
                            <form action="/user/{{$show->id}}" method="POST">
                                <div class="form-group col-md-3">
                                    <button class="btn btn-{{$theme}}" type="submit" name="friend" value="friend">
                                        @if(empty($friend))
                                       Add Friend
                                        @else 
                                        Unfriend
                                        @endif
                                    </button>
                                </div>
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endsection