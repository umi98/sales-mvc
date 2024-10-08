<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $primary_key = "id";
    protected $fillable = [
        'nama_produk'
    ];

    public function leads(){
        return $this->hasMany(Leads::class,'id_produk');
    }
}
