<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;
    protected $primary_key = "id";

    protected $fillable = [
        'tanggal',
        'id_sales',
        'id_produk',
        'no_wa',
        'nama_lead',
        'kota',
        'id_user'
    ];

    public function sales() {
        return $this->belongsTo(Sales::class,'id_sales');
    }

    public function products(){
        return $this->belongsTo(Products::class,'id_produk');
    }
}
