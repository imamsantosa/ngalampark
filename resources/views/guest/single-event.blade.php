@extends('template.template')

@section('title') Event {{$post->title}} | ngalampark.com @endsection

@section('breadcumb')
    <div id="breadcumb">
        <div class="container">
            <div class="col-md-12">
                <p><a href="{{route('index')}}">Home</a> / <a href="{{route('list-event')}}">event</a>  / <a href="{{route('event-single', ['id' => $post->id, 'judul'=>$post->title])}}">{{$post->title}}</a> </p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <h3 class="text-center">{{$post->title}}</h3>
    <div class="row" style="padding: 16px 16px">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <img class="event-img" src="{{route('image', ['folder' => 'event', 'name' => $post->image])}}" alt="product">
                </div>
            </div>

            <h5 class="text-left">Waktu Pelaksaan : {{$post->date}}</h5>

            <p>{{$post->content}}</p>
        </div>
    </div>

@endsection