@extends('template.admin')

@section('title') data event | ngalampark.com @endsection

@section('content')
    <h3 class="text-center">Data Event</h3>
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
                        <th>Judul</th>
                        <th>Tanggal Event</th>
                        <th>Tanggal dibuat</th>
                        <th>Tanggal Update</th>
                        <th>Author</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                @foreach($data as $event)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$event->title}}</td>
                        <td>{{$event->date}}</td>
                        <td>{{$event->created_at}}</td>
                        <td>{{$event->updated_at}}</td>
                        <td>{{$event->author->username}}</td>
                        <td>
                            <a href="{{route('admin-delete-event', ['id' => $event->id])}}"><div class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></div></a>
                            <a href="{{route('admin-edit-event', ['id' => $event->id])}}"><div class="btn btn-warning btn-sm"><span class="fa fa-pencil-square-o"></span></div></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection