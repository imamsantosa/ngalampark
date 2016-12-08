<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataTiket extends Model
{
    protected $table = 'data_tiket';

    protected $fillable = [
        'name',
        'id_number',
        'booking_code',
        'is_print',
        'date'
    ];

    public function Tiket()
    {
        return $this->belongsTo(Tiket::class, 'date');
    }
}
