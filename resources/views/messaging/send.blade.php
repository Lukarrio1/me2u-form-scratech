@extends('layouts.app') 
@section('theme')
<nav class="navbar navbar-expand-md navbar-dark navbar-laravel bg-{{$theme}}  sticky-top">
    @endsection @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pt-5">
                <div class="card  border-{{$theme}}">
                    <div class="card-body">
                        <div class="">
                            <form action="/messaging" method="POST">
                                <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" rows="5" name="message"></textarea>
                                </div>
                                <div class="form-group col-md-3">
                                 <button class="btn btn-{{$theme}}" type="submit">Send</button>
                                </div>
                                <input type="hidden" name="user_id" value={{$user_id}}>
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