<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public function pesanan_detail() 
    {   
        return $this->hasMany('App\Models\Pesanan_detail','barang_id', 'id');
    } 
}
