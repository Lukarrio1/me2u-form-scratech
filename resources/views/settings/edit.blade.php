@extends('layouts.app')
@section('theme')
<nav class="navbar navbar-expand-md navbar-dark navbar-laravel bg-{{$theme}}  sticky-top">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-{{$theme}}">
                <div class="card-header bg-white h3 text-center">Settings</div>
                <div class="card-body">
                        <form action="/settings/{{$id}}" method="POST">
                            <div class="form-group col-md-3">
                            <label for="theme">Theme</label>
                                    <select id="theme" class="form-control" name="theme">
                                      <option  value="primary">Blue</option>
                                      <option value="success">Green</option>
                                      <option value="dark">Black</option>
                                      <option value="warning">yellow</option>
                                      <option value="danger">Red</option>
                                      <option value="info">Light blue</option>
                                    </select>
                                  </div>
                                <div>
                                    <button class="btn btn-{{$theme}}" type="submit">
                                    Save Changes
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
@endsection
