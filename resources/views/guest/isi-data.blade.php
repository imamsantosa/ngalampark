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
                    <h4 class="text-center">Tanggal : {{$data['tanggal']->tanggal}}</h4>
                    <h4 class="text-center">Harga : Rp. {{$data['tanggal']->harga}}</h4>
                    <br>
                    <form action="{{route('isi-data-proses')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="tk" value="{{$data['tiket']}}">
                        <input type="hidden" name="tgl" value="{{$data['tanggal']->id}}">
                        <table class="table">
                            <tr>
                                <td>No</td>
                                <td width="50%">Nama</td>
                                <td width="50%">Identitas</td>
                            </tr>
                            @for($i = 1; $i <= $data['tiket']; $i++)
                            <tr>
                                <td>{{$i}}</td>
                                <td><input type="text" class="form-field" required="required" name="name[]"></td>
                                <td><input type="text" class="form-field" required="required" name="identitas[]"></td>
                            </tr>
                            @endfor
                        </table>
                        <input type="submit" value="Pesan" class="btn btn-success btn-block">
                    </form>
                </div>
            </div>


        </div>
    </div>

@endsection