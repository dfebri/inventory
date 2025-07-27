<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateraiModel extends Model
{
    use HasFactory;
    protected $table = "tbl_materai";
    protected $primaryKey = "mt_id";

    protected $filable = [
        'mt_nama',
        'barang_kode',
        'mt_tanggal',
        'mt_stock',
        'mt_request',
        'mt_penggunaan',

    ];
}
