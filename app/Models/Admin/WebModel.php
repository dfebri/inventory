<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebModel extends Model
{
    use HasFactory;
    protected $table = "tbl_web";
    protected $primarykey = 'web_id';
    protected $fillable = [
        'web_nama',
        'web_logo',
        'web_deskripsi'
    ];
}
