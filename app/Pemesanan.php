<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $fillable = [
        'booking_code',
        'payment_code',
        'is_pay',
        'payment_date',
        'is_active'
    ];

    public function dataTiket()
    {
        return $this->hasMany(DataTiket::class, 'booking_code', 'booking_code');
    }
}
