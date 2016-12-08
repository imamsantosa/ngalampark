<?php

namespace App\Http\Controllers;

use App\DataTiket;
use App\Pemesanan;
use App\Tiket;
use Illuminate\Http\Request;

class PemesananTiket extends Controller
{
    public function indexData(Request $request)
    {
        if($request->input('t') == null || $request->input('tk') == null)
            return redirect()->route('index');

        if($request->input('tk') > 4)
            return redirect()->route('index');

        $tanggal = Tiket::find($request->input('t'));

        if($tanggal == null)
            return redirect()->route('index');

        $data = [
            'tanggal' => $tanggal,
            'tiket' => $request->input('tk')
        ];

        return view('guest/isi-data', compact('data'));
    }

    public function setDataProcess(Request $request)
    {
        $pemesanan = Pemesanan::create([
            'is_pay' => false,
            'booking_code' => '',
            'payment_code' => ''
        ]);
        
        $bookingcode = 'A'.rand(100,999).$pemesanan->id;
        $paymentcode = rand(100,999).$pemesanan->id;
        $pemesanan->update([
            'booking_code' => $bookingcode,
            'payment_code' => $paymentcode
        ]);

        $name = $request->input('name');
        $id_number = $request->input('identitas');
        for($i = 0; $i < $request->input('tk'); $i++){
            DataTiket::create([
               'booking_code' => $bookingcode,
                'id_number' => $id_number[$i],
                'name' => $name[$i],
                'is_print' => false,
                'date' => $request->input('tgl')
            ]);
        }
        
        return redirect()->route('isi-data-sukses', ['id_booking' => $bookingcode]);
    }

    public function success($bookingcode)
    {
        $data = Pemesanan::where('booking_code', $bookingcode)->first();

        if($data == null) {
            return redirect()->route('index');
        }

        $tmp = $data->dataTiket->first()->Tiket;
        $kelengkapan =[
            'tanggal' => $tmp->tanggal,
            'harga' => $tmp->harga
        ];



        return view('guest/isi-data-sukses', compact('data', 'kelengkapan'));
    }

    public function dataPemesanan()
    {
        $dataPemesanan = Pemesanan::orderBy('id', 'desc')->get();

        return view('admin/data-pemesanan', compact('dataPemesanan'));
    }

    public function confirmPemesanan($id)
    {
        $data = Pemesanan::find($id);

        $data->update([
            'is_pay' => true,
            'payment_date' => date('y-m-d')
        ]);

        return redirect()->route('admin-data-pemesanan')
            ->with([
                'status' => 'success',
                'message' => 'Berhasil mengkonfirmasi pembayaran'
            ]);
    }

    public function deletePemesanan($id)
    {
        $data = Pemesanan::find($id);
        $data->delete();

        return redirect()->route('admin-data-pemesanan')
            ->with([
                'status' => 'success',
                'message' => 'Berhasil menghapus pemesanan'
            ]);
    }
    
    public function indexBatal()
    {
        return View('guest/batal-pemesanan');
    }

    public function batalPemesananKonfirmasi(Request $request)
    {

        $data = Pemesanan::where('booking_code', $request->input('book'))->first();

        if($data == null)
            return redirect()->route('batal-pemesanan')->with(['status' => 'danger', 'message' => 'Data tidak ditemukan']);

        if(!$data->is_active)
            return redirect()->route('batal-pemesanan')->with(['status' => 'danger', 'message' => 'Data tidak ditemukan']);

        $tmp = $data->dataTiket->first()->Tiket;
        $kelengkapan =[
            'tanggal' => $tmp->tanggal,
            'harga' => $tmp->harga
        ];

        return view('guest/batal-pemesanan-konfirmasi', compact('data', 'kelengkapan'));
    }

    public function batalPemesananProses($kodebooking)
    {
        $data = Pemesanan::where('booking_code', $kodebooking)->first();

        if($data == null)
            return redirect()->route('batal-pemesanan')->with(['status' => 'danger', 'message' => 'Data tidak ditemukan']);

        if(!$data->is_active)
            return redirect()->route('batal-pemesanan')->with(['status' => 'danger', 'message' => 'Data tidak ditemukan']);

        $data->update([
            'is_active' => false
        ]);

        return redirect()->route('batal-pemesanan')->with(['status' => 'success', 'message' => 'Tiket anda sukses dibatalkan']);
    }
}
