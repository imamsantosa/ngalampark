@extends('template.template')

@section('title') isi data | ngalampark.com @endsection

@section('breadcumb')
    <div id="breadcumb">
        <div class="container">
            <div class="col-md-12">
                <p><a href="{{route('index')}}">Home</a> / pemesanan tiket / isi data </p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <h3 class="text-center">Isi Data</h3>
    <div class="row" style="padding: 16px 16px">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @if(session('status'))
                        <div class="alert alert-{{session('status')}}">
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <br>
                    <form action="{{route('batal-pemesanan-konfirmasi')}}" method="get">
                        <div class="form-group">
                            <label class="control-label">Kode Booking</label>
                            <input type="text" class="form-control" placeholder="Kode Booking" name="book">
                        </div>
                        <br>
                        <input type="submit" value="Batalkan Tiket" class="btn btn-success btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection