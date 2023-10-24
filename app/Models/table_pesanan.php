<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table_pesanan extends Model
{
    use HasFactory;
    protected $table = 'table_pesanans';
     protected $fillable = ['user_id', 'barang_id', 'jumlah', 'harga_total', 'status'];

    public function barang() {
        return $this->belongsToMany(table_barang::class, 'table_pesanans', 'pesanan_id', 'barang_id');
    }
}
