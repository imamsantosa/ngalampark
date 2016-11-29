@extends('template.admin')

@section('title') add event | ngalampark.com @endsection

@section('content')
    <h3 class="text-center">Tambah Event</h3>
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-{{session('status')}}">
                    <strong>{{session('message')}}</strong>
                </div>
            @endif
            <form action="{{route('admin-add-event-process')}}" method="post" style="margin-bottom: 16px" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label >Judul Event</label>
                    <input type="text" name="title" class="form-control" placeholder="judul">
                </div>
                <div class="form-group">
                    <label >Tanggal Event</label>
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
                    <label >Image Event</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="form-group">
                    <label >Detail Event</label>
                    <textarea name="content" rows="20" class="form-control"></textarea>
                </div>
                <input type="submit" class="btn btn-success" value="simpan">
            </form>
        </div>
    </div>

@endsection