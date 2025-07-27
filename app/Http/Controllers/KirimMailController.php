<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class KirimMailController extends Controller
{
    public function Mail(){
        // $data = "dwifebrimurcahyo@gmail.com";
        $email = 'dwifebrimurcahyo@gmail.com';
        $data = [
            // 'title' => 'Selamat datang!',
            'url' => route('http://127.0.0.1:8000/admin/barang-keluar'),
        ];
        Mail::to($email)->send(new SendMail($data));
        return 'Berhasil mengirim email!';
    }


}
