<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('id', 'desc')->get();
        return view('index', compact('events'));
    }

    public function home()
    {
        $events = Event::orderBy('id', 'desc')->get();

        return view('admin/home', compact('events'));
    }
}
