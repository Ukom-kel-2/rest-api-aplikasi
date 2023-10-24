<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table_barang extends Model
{
    use HasFactory;
    protected $table = 'table_barangs';
    protected $fillable = ['nama_barang', 'kategori', 'stok', 'harga'];
}
