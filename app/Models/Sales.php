<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $primary_key = "id";
    protected $fillable = [
        'nama_sale'
    ];

    public function leads(){
        return $this->hasMany(Leads::class,'id_sales');
    }
}
