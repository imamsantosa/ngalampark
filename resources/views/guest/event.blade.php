@extends('template.template')

@section('title') Event | ngalampark.com @endsection

@section('breadcumb')
    <div id="breadcumb">
        <div class="container">
            <div class="col-md-12">
                <p><a href="{{route('index')}}">Home</a> / event </p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <h3 class="text-center">All Event</h3>
    <div class="row" style="padding: 16px 16px">
        <div class="col-md-6 col-md-offset-3">
            <table id="data-event">
                @foreach($posts as $post)
                <tr>
                    <td width="15%">
                        <img class="event-img" src="{{route('image', ['folder' => 'event', 'name' => $post->image])}}" alt="product">
                    </td>
                    <td width="5%">
                        &nbsp;
                    </td>
                    <td style="vertical-align: top">
                        <h5><a href="{{route('event-single', ['judul' => $post->title, 'id'=>$post->id])}}">Nama event : {{$post->title}}</a> </h5>
                        <h6>Tanggal Pelaksanaan : {{$post->date}}</h6>
                    </td>
                </tr>
                    <tr>
                        <td height="5%">&nbsp;</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection