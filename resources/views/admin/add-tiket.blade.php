@extends('template.admin')

@section('title') Tambah Tiket | ngalampark.com @endsection

@section('content')
    <h3 class="text-center">Tiket</h3>
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-{{session('status')}}">
                    <strong>{{session('message')}}</strong>
                </div>
            @endif
            <br>
            <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah Tiket</button>
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Kapasitas</th>
                    <th>Sisa Tiket</th>
                    <th>Harga</th>
                    <th>Tanggal Update</th>
                    <th>Author</th>
                    <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $tiket)
                    <tr>
                        <td>{{$tiket->tanggal}}</td>
                        <td>{{$tiket->limit}}</td>
                        <td>{{$tiket->getRest()}}</td>
                        <td>Rp. {{ number_format($tiket->harga,2,',','.') }}</td>
                        <td>{{$tiket->updated_at}}</td>
                        <td>{{$tiket->author->username}}</td>
                        <td>
                            <a href="{{route('admin-delete-tiket', ['id' => $tiket->id])}}" onclick="return confirm('apakah anda yakin akan menghapus tiket pada tanggal tersebut?')"><div class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></div></a>
                            <a href="{{route('admin-edit-tiket', ['id' => $event->id])}}"><div class="btn btn-warning btn-sm"><span class="fa fa-pencil-square-o"></span></div></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Buat tiket</h4>
                </div>
                <form method="post" action="{{route('admin-add-tiket-process')}}" id="form-add">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label >Tanggal Tiket</label>
                            <div class="row" style="padding: 0px 0px">
                                <div class="col-md-2">
                                    <select class="form-control" name="tgl">
                                        @for($i=1; $i<=31; $i++)
                                            <option>{{($i <10)? '0'.$i : $i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="bln">
                                        <option>Januari</option>
                                        <option>Februari</option>
                                        <option>Maret</option>
                                        <option>April</option>
                                        <option>Mei</option>
                                        <option>Juni</option>
                                        <option>Juli</option>
                                        <option>Agustus</option>
                                        <option>September</option>
                                        <option>Oktober</option>
                                        <option>November</option>
                                        <option>Desember</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="thn">
                                        @for($i=date('Y'); $i<=date('Y')+4; $i++)
                                            <option >{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Kapasitas</label>
                            <input type="text" name="kapasitas" class="form-control caps" placeholder="kapasitas (angka)">
                        </div>
                        <div class="form-group">
                            <label >Harga</label>
                            <input type="text" name="harga" class="form-control fee" placeholder="harga">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('additional-footer')
    <script>
        $(document).ready(function(){
           $('#form-add').on('submit', function(){
               var data = $('.caps').val();
               var fee = $('.fee').val();
               if(data != Number(data)){
                   alert('Kapasitas yang anda masukan salah');
                   return false;
               }

               if(fee != Number(fee)){
                   alert('Harga yang anda masukan salah');
                   return false;
               }
           });
        });
    </script>
@endsection