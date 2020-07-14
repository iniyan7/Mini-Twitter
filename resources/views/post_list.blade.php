@extends('welcome')
@section('browser_title', 'Tweet')
@section('content')
<div class="position-ref full-height">
    <h1>Mini Twitter</h1>
    <div class="alert alert-success" style="display:none"></div>
    <h2 class="sub-heading">Recent tweets <span class="count">(Latest 10 tweets only)</span></h2>
    <div class="top-right links">
        <a href="{{ url('/post-form')}}" class="btn btn-primary">Post a tweet</a>
    </div>

    <div class="container">
    	@foreach($messages as $message)
        <h3 class="user-title">{{$message->full_name}} <span class="duration-time">{{\Carbon\Carbon::parse($message['created_at'])->diffForHumans()}}</span></h3>
        <div class="body-right links">
            <p class="tweet-content">{{$message->message}}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection