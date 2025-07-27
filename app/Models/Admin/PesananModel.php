<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananModel extends Model
{
    use HasFactory;
    protected $table = "tbl_pesanan";
    protected $primaryKey = 'ps_id';

    protected $fillable = [
        'ps_kode',
        'barang_kode',
        'ps_barang',
        'ps_tanggal',
        'ps_nama',
        'ps_divisi',
        'ps_jumlah',
        'ps_gambar',
    ];
}
