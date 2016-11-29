@extends('template.admin')

@section('title') Edit event | ngalampark.com @endsection

@section('content')
    <h3 class="text-center">Edit Event</h3>
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-{{session('status')}}">
                    <strong>{{session('message')}}</strong>
                </div>
            @endif
            <form action="{{route('admin-edit-event-process')}}" method="post" style="margin-bottom: 16px" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="form-group">
                    <label >Judul Event</label>
                    <input type="text" name="title" class="form-control" placeholder="judul" value="{{$data->title}}">
                </div>
                <div class="form-group">
                    <label >Tanggal Event</label>
                    <div class="row" style="padding: 0px 0px">
                        <div class="col-md-2">
                            <select class="form-control" name="tgl">
                                @for($i=1; $i<=31; $i++)
                                    <option @if(substr($data->date, 0, 2) == $i)  selected  @endif>{{($i <10)? '0'.$i : $i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" name="bln">
                                <option @if(substr($data->date, 3, 7) == 'Januari') selected @endif>Januari</option>
                                <option @if(substr($data->date, 3, 8) == 'Februari') selected @endif>Februari</option>
                                <option @if(substr($data->date, 3, 5) == 'Maret') selected @endif>Maret</option>
                                <option @if(substr($data->date, 3, 5) == 'April') selected @endif>April</option>
                                <option @if(substr($data->date, 3, 3) == 'Mei') selected @endif>Mei</option>
                                <option @if(substr($data->date, 3, 4) == 'Juni') selected @endif>Juni</option>
                                <option @if(substr($data->date, 3, 4) == 'Juli') selected @endif>Juli</option>
                                <option @if(substr($data->date, 3, 7) == 'Agustus') selected @endif>Agustus</option>
                                <option @if(substr($data->date, 3, 9) == 'September') selected @endif>September</option>
                                <option @if(substr($data->date, 3, 7) == 'Oktober') selected @endif>Oktober</option>
                                <option @if(substr($data->date, 3, 8) == 'November') selected @endif>November</option>
                                <option @if(substr($data->date, 3, 8) == 'Desember') selected @endif>Desember</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" name="thn">
                                @for($i=date('Y'); $i<=date('Y')+4; $i++)
                                    <option @if($i == substr($data->date, -4)) selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label >Detail Event</label>
                    <textarea name="content" rows="20" class="form-control">{{$data->content}}</textarea>
                </div>
                <input type="submit" class="btn btn-success" value="simpan">
            </form>
        </div>
    </div>

@endsection