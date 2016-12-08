@extends('template.admin')

@section('title') data pemesanan | ngalampark.com @endsection

@section('content')
    <h3 class="text-center">Data Pemesanan</h3>
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-{{session('status')}}">
                    <strong>{{session('message')}}</strong>
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Booking</th>
                    <th>Kode Bayar</th>
                    <th>Status Bayar</th>
                    <th>Status Pemesanan</th>
                    <th>Total Tiket</th>
                    <th>Tanggal Bayar</th>
                    <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                @foreach($dataPemesanan as $data)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$data->booking_code}}</td>
                        <td>{{$data->payment_code}}</td>
                        <td>{{($data->is_pay)? 'Sudah' : 'Belum'}}</td>
                        <td>{{($data->is_active)? 'Aktif' : 'Batal'}}</td>
                        <td>{{$data->dataTiket->count()}}</td>
                        <td>{{($data->payment_date == null)? '0' : $data->payment_date}}</td>
                        <td>
                            @if(!$data->is_pay)
                            <a href="{{route('admin-konfirmasi-data-pemesanan', ['id' => $data->id])}}" class="btn btn-sm btn-warning" onclick="return confirm('apakah anda akan mengkonfirmasi pemesanan ini?')"><span class="fa fa-check"></span></a>
                            @endif
                            <a href="{{route('admin-hapus-data-pemesanan', ['id' => $data->id])}}" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda akan menghapus pemesanan ini?')"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection