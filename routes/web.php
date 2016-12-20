<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['uses' => 'IndexController@index', 'as' => 'index']);

Route::group(['prefix' => 'tiket', 'namespace' => 'tiket'], function(){
    Route::get('/', function(){
        return redirect()->route('tiket-pesan');
    });

    Route::get('pesan', ['uses' => 'TiketController@index', 'as'=>'tiket-pesan']);
    Route::get('batal', ['uses' => 'TiketController@indexBatal', 'as' => 'tiket-batal']);
});

Route::group(['prefix' => 'event'], function(){
    Route::get('/', ['uses' => 'EventController@listEvent', 'as' => 'list-event']);
    Route::get('{judul}/{id}', ['uses'=>'EventController@singlePost', 'as' => 'event-single']);
});

Route::group(['prefix' => 'pemesanan'], function(){
    Route::get('/', function(){return redirect()->route('index');});
    Route::get('isi-data', ['uses' => 'PemesananTiket@indexData', 'as' => 'isi-data']);
    Route::post('isi-data-proses', ['uses' => 'PemesananTiket@setDataProcess', 'as' => 'isi-data-proses']);
    Route::get('isi-data-sukses/{id_booking}', ['uses' => 'PemesananTiket@success', 'as' => 'isi-data-sukses']);
    Route::get('batal-pemesanan', ['uses' => 'PemesananTiket@indexBatal', 'as' => 'batal-pemesanan']);
    Route::get('batal-pemesanan-konfirmasi', ['uses' => 'PemesananTiket@batalPemesananKonfirmasi', 'as' => 'batal-pemesanan-konfirmasi']);
    Route::get('batal-pemesanan/{kodebooking}', ['uses' => 'PemesananTiket@batalPemesananProses', 'as' => 'batal-pemesanan-proses']);


    Route::get('cetak-tiket', ['uses' => 'PemesananTiket@indexCetak', 'as' => 'cetak-tiket']);
    Route::get('cetak-tiket-konfirmasi', ['uses' => 'PemesananTiket@cetakTiketKonfirmasi', 'as' => 'cetak-tiket-konfirmasi']);
    Route::get('cetak-tiket/{kodebooking}', ['uses' => 'PemesananTiket@cetakTiketProses', 'as' => 'cetak-tiket-proses']);

});

Route::get('images/{folder}/{name}', ['uses' => 'ImageController@getImage', 'as' => 'image']);

Route::get('auth/login', ['uses' => 'AuthenticationController@login', 'as' => 'login']);
Route::post('auth/login', ['uses' => 'AuthenticationController@loginProcess', 'as' => 'login-proses']);
Route::get('auth/logout', ['uses' => 'AuthenticationController@logout', 'as' => 'logout']);

Route::group(['prefix' => 'admin'], function(){
    Route::get('home', ['uses' => 'IndexController@home', 'as' => 'admin-home']);

    Route::group(['prefix' => 'event'], function(){
        Route::get('data-event', ['uses' => 'EventController@dataEvent', 'as' => 'admin-data-event']);
        Route::get('delete-event/{id}', ['uses' => 'EventController@deleteEvent', 'as' => 'admin-delete-event']);
        Route::get('edit-event/{id}', ['uses' => 'EventController@editEventIndex', 'as' => 'admin-edit-event']);
        Route::post('edit-event-process', ['uses' => 'EventController@editEventProcess', 'as' => 'admin-edit-event-process']);
        Route::get('add-event', ['uses' => 'EventController@addEventIndex', 'as' => 'admin-add-event']);
        Route::post('add-event-process', ['uses' => 'EventController@addEventProcess', 'as' => 'admin-add-event-process']);
    });

    Route::group(['prefix' => 'tiket'], function(){
        Route::get('add-tiket', ['uses' => 'TiketController@addTiket', 'as' => 'admin-add-tiket']);
        Route::post('add-tiket', ['uses' => 'TiketController@addTiketProcess', 'as'=>'admin-add-tiket-process']);
        Route::get('delete-tiket/{id}', ['uses' => 'TiketController@deleteTiket', 'as' => 'admin-delete-tiket']);
        Route::get('edit-tiket/{id}', ['uses' => 'TiketController@editTiket', 'as' => 'admin-edit-tiket']);
        Route::post('edit-tiket-process', ['uses' => 'TiketController@editTiketProcess', 'as' => 'admin-edit-tiket-process']);

        Route::get('data-pemesanan', ['uses' => 'PemesananTiket@dataPemesanan', 'as' => 'admin-data-pemesanan']);
        Route::get('konfirmasi-data-pemesanan/{id}', ['uses' => 'PemesananTiket@confirmPemesanan', 'as' => 'admin-konfirmasi-data-pemesanan']);
        Route::get('hapus-data-pemesanan/{id}', ['uses' => 'PemesananTiket@deletePemesanan', 'as' => 'admin-hapus-data-pemesanan']);

    });

});
