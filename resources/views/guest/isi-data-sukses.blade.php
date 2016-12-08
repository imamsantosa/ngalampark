@extends('template.template')

@section('title') sukses isi data | ngalampark.com @endsection

@section('breadcumb')
    <div id="breadcumb">
        <div class="container">
            <div class="col-md-12">
                <p><a href="{{route('index')}}">Home</a> / pemesanan tiket / isi data / sukses </p>
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
                    <h4 class="text-center">Terima Kasih Telah Memesan tiket di ngalampark. Berikut data tiket yang anda pesan</h4>
                    <table>
                        <tr>
                            <td>Tanggal</td>
                            <td> : </td>
                            <td>{{$kelengkapan['tanggal']}}</td>
                        </tr>
                        <tr>
                            <td width="25%">Harga</td>
                            <td width="5%"> : </td>
                            <td width="50%">{{$kelengkapan['harga']}}</td>
                        </tr>
                        <tr>
                            <td>Kode Booking</td>
                            <td> : </td>
                            <td>{{$data->booking_code}}</td>
                        </tr>
                        <tr>
                            <td>Kode Pembayaran</td>
                            <td> : </td>
                            <td>{{$data->payment_code}}</td>
                        </tr>
                    </table>
                    <br>
                    <table class="table">
                        <tr>
                            <td>No</td>
                            <td width="50%">Nama</td>
                            <td width="50%">Identitas</td>
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
                    <p>Diharapkan untuk segera melakukan pembayaran. Terima Kasih</p>
                    <a href="{{route('index')}}" class="btn btn-block btn-success">Kembali ke home</a>
                </div>
            </div>


        </div>
    </div>

@endsection