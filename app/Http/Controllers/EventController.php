<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function addEventIndex()
    {
        return view('admin/add-event');
    }

    public function addEventProcess(Request $request)
    {
        $newEvent = Event::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'date' => $request->input('tgl').' '.$request->input('bln').' '.$request->input('thn'),
            'image' => '',
            'author_id' => auth()->user()->id
        ]);

        Storage::put(
            'event/'.$newEvent->id.'.jpeg',
            file_get_contents($request->file('image')->getRealPath())
        );

        $newEvent->update([
            'image' => $newEvent->id.'.jpeg'
        ]);

        return redirect()->route('admin-data-event')
            ->with([
                'message' => 'Berhasil menambah event',
                'status' => 'success'
            ]);
    }

    public function dataEvent()
    {
        $data = Event::all();

        return View('admin/data-event', compact('data'));
    }

    public function deleteEvent($id)
    {
        $data = Event::find($id);
        $data->delete();

        return redirect()->route('admin-data-event')
            ->with([
                'message' => 'Berhasil menghapus event dengan judul '.$data->title,
                'status' => 'success'
            ]);
    }

    public function editEventIndex($id)
    {
        $data = Event::find($id);

        return view('admin/edit-event', compact('data'));
    }

    public function editEventProcess(Request $request)
    {
        $data = Event::find($request->input('id'));
        $data->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'date' => $request->input('tgl').' '.$request->input('bln').' '.$request->input('thn'),
            'author_id' => auth()->user()->id
        ]);

        return redirect()->route('admin-data-event')
            ->with([
                'message' => 'Berhasil memperbarui event dengan judul '.$data->title,
                'status' => 'success'
            ]);
    }

    public function singlePost($judul, $id)
    {
        $post = Event::find($id);

        if($post == null){
            return redirect()->route('404');
        }

        return view('guest/single-event', compact('post'));
    }

    public function listEvent()
    {
        $events = Event::all();

        return view('guest/event', compact('events'));
    }
}
