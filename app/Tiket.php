<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tiket';

    protected $fillable = [
        'tanggal',
        'limit',
        'author_id',
        'harga'
    ];

    public function getRest()
    {
        return (($this->limit) - ($this->DataTiket->count()));
    }

    public function DataTiket()
    {
        return $this->hasMany(DataTiket::class, 'date');
    }
    public function author()
    {
        return $this->belongsTo(Admin::class);
    }
}
