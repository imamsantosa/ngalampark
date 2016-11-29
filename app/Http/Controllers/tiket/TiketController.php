<?php

namespace App\Http\Controllers\tiket;

use App\Tiket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TiketController extends Controller
{
    public function addTiket()
    {
        $data = Tiket::all();
        return view('admin/add-tiket', compact('data'));
    }

    public function addTiketProcess(Request $request)
    {
        $tanggal = $request->input('tgl').' '.$request->input('bln').' '.$request->input('thn');
        $cek = Tiket::where('tanggal', $tanggal)->count();
        if($cek >= 1){
            return redirect()->route('admin-add-tiket')
                ->with([
                    'status' => 'danger',
                    'message' => 'Tanggal yang anda masukan sudah ada'
                ]);
        }

        $newdata = Tiket::create([
            'tanggal' => $tanggal,
            'limit' => $request->input('kapasitas'),
            'author_id' => auth()->user()->id,
            'harga' => $request->input('harga')
        ]);

        return redirect()->route('admin-add-tiket')
            ->with([
                'status' => 'success',
                'message' => 'Berhasil membuat tiket pada tanggal '.$newdata->tanggal
            ]);
    }

    public function deleteTiket($id)
    {
        $data = Tiket::find($id);
        $data->delete();

        return redirect()->route('admin-add-tiket')
            ->with([
                'status' => 'success',
                'message' => 'Berhasil menghapus tiket pada tanggal '.$data->tanggal
            ]);
    }
}
