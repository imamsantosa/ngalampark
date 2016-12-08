@extends('template.admin')

@section('title') Tambah Tiket | ngalampark.com @endsection

@section('content')
    <h3 class="text-center">Edit Tiket</h3>
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-{{session('status')}}">
                    <strong>{{session('message')}}</strong>
                </div>
            @endif
            <br>
                <form method="post" action="{{route('admin-edit-tiket-process')}}" id="form-add">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="form-group">
                        <label >Tanggal Tiket</label>
                        <div class="row" style="padding: 0px 0px">
                            <div class="col-md-2">
                                <select class="form-control" name="tgl" disabled="disabled">
                                    @for($i=1; $i<=31; $i++)
                                        <option @if(substr($data->tanggal, 0, 2) == $i)  selected  @endif>{{($i <10)? '0'.$i : $i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" name="bln" disabled="disabled">
                                    <option @if(substr($data->tanggal, 3, 7) == 'Januari') selected @endif>Januari</option>
                                    <option @if(substr($data->tanggal, 3, 8) == 'Februari') selected @endif>Februari</option>
                                    <option @if(substr($data->tanggal, 3, 5) == 'Maret') selected @endif>Maret</option>
                                    <option @if(substr($data->tanggal, 3, 5) == 'April') selected @endif>April</option>
                                    <option @if(substr($data->tanggal, 3, 3) == 'Mei') selected @endif>Mei</option>
                                    <option @if(substr($data->tanggal, 3, 4) == 'Juni') selected @endif>Juni</option>
                                    <option @if(substr($data->tanggal, 3, 4) == 'Juli') selected @endif>Juli</option>
                                    <option @if(substr($data->tanggal, 3, 7) == 'Agustus') selected @endif>Agustus</option>
                                    <option @if(substr($data->tanggal, 3, 9) == 'September') selected @endif>September</option>
                                    <option @if(substr($data->tanggal, 3, 7) == 'Oktober') selected @endif>Oktober</option>
                                    <option @if(substr($data->tanggal, 3, 8) == 'November') selected @endif>November</option>
                                    <option @if(substr($data->tanggal, 3, 8) == 'Desember') selected @endif>Desember</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" name="thn" disabled="disabled">
                                    @for($i=date('Y'); $i<=date('Y')+4; $i++)
                                        <option @if($i == substr($data->date, -4)) selected @endif>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label >Kapasitas</label>
                        <input type="text" name="kapasitas" class="form-control caps" placeholder="kapasitas (angka)" value="{{$data->limit}}">
                    </div>
                    <div class="form-group">
                        <label >Harga</label>
                        <input type="text" name="harga" class="form-control fee" placeholder="harga" value="{{$data->harga}}">
                    </div>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </form>
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