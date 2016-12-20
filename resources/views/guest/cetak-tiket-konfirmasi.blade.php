@extends('template.template')

@section('title') Cetak Tiket | ngalampark.com @endsection

@section('breadcumb')
    <div id="breadcumb">
        <div class="container">
            <div class="col-md-12">
                <p><a href="{{route('index')}}">Home</a> / Cetak tiket / konfirmasi </p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <h3 class="text-center">Cetak Tiket</h3>
    <div class="row" style="padding: 16px 16px">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h4 class="text-center">Berikut data tiket anda.</h4>
                    <table>
                        <tr>
                            <td width="25%">Tanggal</td>
                            <td width="5%"> : </td>
                            <td width="50%">{{$kelengkapan['tanggal']}}</td>
                        </tr>
                        <tr>
                            <td>Kode Booking</td>
                            <td> : </td>
                            <td>{{$data->booking_code}}</td>
                        </tr>
                    </table>
                    <br>
                    <table class="table">
                        <tr>
                            <td>No</td>
                            <td width="50%">Nama</td>
                            <td width="50%">Nomor Identitas</td>
                        </tr>
                        <?php $i = 1;?>
                        @foreach($data->datatiket as $d)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$d->name}}</td>
                                <td>{{$d->id_number}}</td>
                            </tr>
                        @endforeach
                    </table>
                    <a href="{{route('cetak-tiket-proses', ['kodebooking' => $data->booking_code])}}" class="btn btn-block btn-success">Cetak Tiket</a>
                </div>
            </div>
        </div>
    </div>

@endsection