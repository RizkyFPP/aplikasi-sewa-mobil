<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjamans';
    protected $fillable = ['pelanggan_id', 'mobil_id', 'tanggal_peminjaman', 'tanggal_pengembalian', 'total_biaya'];
    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }
}
