<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function getImage($folder, $name)
    {
        $pathimage = $folder.'/'.$name;

        return response(Storage::get($pathimage), 200)->header('Content-Type', 'image/jpeg');
    }
}
