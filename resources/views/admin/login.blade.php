@extends('template.template')

@section('title') Login | ngalampark.com @endsection

@section('breadcumb')
    <div style="margin-top: 60px"></div>
    {{--<div id="breadcumb">--}}
        {{--<div class="container">--}}
            {{--<div class="col-md-12">--}}
                {{--<p></p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection

@section('content')
    <h3 class="text-center">Login</h3>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @if(session('status'))
                <div class="alert alert-{{session('status')}}">
                    <strong>{{session('message')}}</strong>
                </div>
            @endif
            <form action="{{route('login-proses')}}" method="post" style="margin-bottom: 16px">
                {{csrf_field()}}
                <div class="form-group">
                    <label >Username</label>
                    <input type="text" name="username" class="form-control" placeholder="username">
                </div>
                <div class="form-group">
                    <label >Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <input type="submit" class="btn btn-success" value="Login">
            </form>
        </div>
    </div>

@endsection