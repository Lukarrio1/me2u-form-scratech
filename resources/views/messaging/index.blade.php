@extends('layouts.app')
@section('theme')
<nav class="navbar navbar-expand-md navbar-dark navbar-laravel bg-{{$theme}}  sticky-top">
@endsection
@section('inbox_count')
{{$count}}
@endsection
@section('content')
<div class="container">
   <form action="">
        <div class="col-2 offset-10">
            <button type="suumit" class="btn btn-{{$theme}}">Clear all</botton>
        </div>
   </form>
<div class="row justify-content-center">
@foreach ($messages as $message)
<div class="col-md-10 pt-3">
    <div class="card  border-{{$theme}}">
        <div class="card-body">
            <p  data-toggle="collapse{{$message->id}}" data-target="#collapse{{$message->id}}" aria-expanded="false" >
                <span class="font-weight-bold h4">{{$message->sender_name}}</span><br>
             <span>{{$message->message}}</span>&nbsp;
             <span>{{date('M j, Y h:ia', strtotime($message->created_at))}}</span>
            </p>
            <div class="pb-2">
          <a class="btn  btn-{{$theme}} " data-toggle="collapse" href="#collapse{{$message->id}}" role="button" aria-expanded="false">
                    Reply
         </a>
         <form action="">
         <button type="suumit" class="btn btn-{{$theme}}">Clear all</botton>
           </form>
            </div>
              <div class="collapse" id="collapse{{$message->id}}">
        <form action="/messaging" method="POST">
            <div class="form-group">
            <textarea class="form-control" id="message" rows="5" name="message"></textarea>
            </div>
            <div class="form-group col-md-2">
             <button class="btn btn-{{$theme}}" type="submit">Send</button>
            </div>
            <input type="hidden" name="user_id" value={{$message->sender_id}}>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
             </form>
        </div>
    </div>
</div>
</div>
@endforeach
</div>
</div>

@endsection
