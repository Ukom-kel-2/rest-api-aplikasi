<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table_user extends Model
{
    use HasFactory;
    protected $table = 'table_users';
    protected $fillable = ['email', 'nama_user', 'password', 'nama_toko', 'alamat'];

    public function pesanan(){
        return $this->hasMany(TablePesanan::class);
    }
}

