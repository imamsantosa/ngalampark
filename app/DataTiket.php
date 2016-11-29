<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataTiket extends Model
{
    protected $table = 'data_tiket';

    public function Tiket()
    {
        return $this->belongsTo(Tiket::class, 'date');
    }
}
