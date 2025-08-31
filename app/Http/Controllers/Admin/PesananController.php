<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Mail\SendMail;
use App\Models\Pesanan;
// use App\Http\Requests\UpdatePesananRequest;
use Illuminate\Http\Request;
use App\Models\Admin\AksesModel;
use Yajra\DataTables\DataTables;
use App\Models\Admin\PesananModel;
use App\Models\Admin\BarangMasukModel;
use App\Models\Admin\BarangkeluarModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePesananRequest;
use App\Models\Admin\BarangModel;

use function Laravel\Prompts\alert;

// use Illuminate\Support\Facades\Mail;


class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["title"] = "Order";
        $data["hakTambah"] = AksesModel::leftJoin('tbl_menu', 'tbl_menu.menu_id', '=', 'tbl_akses.menu_id')
        ->where(array('tbl_akses.role_id' => Session::get('user')->role_id, 'tbl_menu.menu_judul' => 'Request', 
        'tbl_akses.akses_type' => 'create'))->count();
        return view('Admin.Pesanan.index', $data);

    }

    public function show(Request $request)
    {
        if($request->ajax()) {
            $data = PesananModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_pesanan.barang_kode')->orderBy('ps_id', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('img', function ($row) {
                    $array = array(
                        "ps_gambar" => $row->ps_gambar,
                    );
                    if ($row->ps_gambar == "image.png") {
                        $img = '<a data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Gmodaldemo8" onclick=gambar(' . json_encode($array) . ')><span class="avatar avatar-lg cover-image" style="background: url(&quot;' . url('/assets/default/barang') . '/' . $row->ps_gambar . '&quot;) center center;"></span></a>';
                    } else {
                        $img = '<a data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Gmodaldemo8" onclick=gambar(' . json_encode($array) . ')><span class="avatar avatar-lg cover-image" style="background: url(&quot;' . url('storage/barang/' . $row->ps_gambar) . '&quot;) center center;"></span></a>';
                    }

                    return $img;
                })
                ->addColumn('tgl', function ($row) {
                    $tgl = $row->ps_tanggal == '' ? '-' : Carbon::parse($row->ps_tanggal)->translatedFormat('d F Y');
                    return $tgl;
                })
                ->addColumn('barang', function ($row) {
                    $barang = $row->ps_barang  == '' ? '-' : $row->ps_barang;
                    return $barang;
                })
                ->addColumn('nama', function($row){
                    $nama = $row->ps_nama == '' ? '-' : $row->ps_nama;                  
                    return $nama;
                })
                ->addColumn('divisi', function ($row) {
                    $divisi = $row->ps_divisi == '' ? '-' : $row->ps_divisi;
                    return $divisi;
                })
                ->addColumn('jumlah', function ($row) {
                    $jumlah = $row->ps_jumlah == '' ? '-' : $row->ps_jumlah;        
                    return $jumlah;
                })
                ->addColumn('action', function ($row) {
                    $array = array(
                        "ps_id" => $row->ps_id,
                        "ps_kode" => $row->ps_kode,
                        "ps_tanggal" => $row->ps_tanggal,
                        "ps_barang" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->ps_barang)),
                        "ps_nama" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->ps_nama)),
                        "ps_divisi" => $row->ps_divisi,
                        "ps_jumlah" => $row->ps_jumlah,
                        "ps_gambar" => $row->ps_gambar
                    );
                    $button = '';
                    $hakEdit = AksesModel::leftJoin('tbl_submenu', 'tbl_submenu.submenu_id', '=', 'tbl_akses.submenu_id')->where(array('tbl_akses.role_id' => Session::get('user')->role_id, 'tbl_submenu.submenu_judul' => 'Barang Keluar', 'tbl_akses.akses_type' => 'update'))->count();
                    $hakDelete = AksesModel::leftJoin('tbl_submenu', 'tbl_submenu.submenu_id', '=', 'tbl_akses.submenu_id')->where(array('tbl_akses.role_id' => Session::get('user')->role_id, 'tbl_submenu.submenu_judul' => 'Barang Keluar', 'tbl_akses.akses_type' => 'delete'))->count();
                    if ($hakEdit > 0 && $hakDelete > 0) {
                        $button .= '
                        <div class="g-2">
                        <a class="btn modal-effect text-primary btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Umodaldemo8" data-bs-toggle="tooltip" data-bs-original-title="Edit" onclick=update(' . json_encode($array) . ')><span class="fe fe-edit text-success fs-14"></span></a>
                        <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=hapus(' . json_encode($array) . ')><span class="fe fe-trash-2 fs-14"></span></a>
                        </div>
                        ';
                    } else if ($hakEdit > 0 && $hakDelete == 0) {
                        $button .= '
                        <div class="g-2">
                            <a class="btn modal-effect text-primary btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Umodaldemo8" data-bs-toggle="tooltip" data-bs-original-title="Edit" onclick=update(' . json_encode($array) . ')><span class="fe fe-edit text-success fs-14"></span></a>
                        </div>
                        ';
                    } else if ($hakEdit == 0 && $hakDelete > 0) {
                        $button .= '
                        <div class="g-2">e
                        <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=hapus(' . json_encode($array) . ')><span class="fe fe-trash-2 fs-14"></span></a>
                        </div>
                        ';
                    } else {
                        $button .= '-';
                    }
                    return $button;
                })
                ->rawColumns(['action', 'img', 'tgl', 'barang', 'nama', 'divisi', 'jumlah'])->make(true);
        }
    }

    public function proses_tambah(Request $request){
      
        $img = "";
           //upload gambar
           if ($request->file('foto')==null) {
            $img = "image.png";
        }else {
            $image = $request->file('foto');
            $image->storeAs('public/barang/', $image->hashName());
            $img = $image->hashName();
        }

        PesananModel::create([
            'ps_gambar' => $img,
            'ps_kode' => $request->reqkode,
            'ps_barang' => $request->barang,
            'ps_tanggal' => $request->tglrequest,
            'ps_nama' => $request->nama,
            'ps_divisi' => $request->divisi,
            'ps_jumlah' => $request->jumlah,
        ]);
        return response()->json(['success' => 'Berhasil']);
    }

    public function proses_ubah(Request $request, PesananModel $pesanan){

        //check if image is uploaded
        if ($request->hasFile('foto')) {
                //upload new image
            $image = $request->file('foto');
            $image->storeAs('public/barang', $image->hashName());

                //delete old image
            Storage::delete('public/barang/' . $pesanan->ps_gambar);
            
            $pesanan->update([
                'ps_gambar' => $image->hashName(),
                'ps_kode' => $request->reqkode,
                'ps_barang'=>$request->barang,
                'ps_tanggal' => $request->tglrequest,
                'ps_nama' => $request->nama,
                'ps_divisi' => $request->divisi,
                'ps_jumlah' => $request->jumlah,
            ]);
        }else{
            //update tanpa img
            $pesanan->update([
                'ps_kode' => $request->reqkode,
                'ps_barang'=>$request->barang,
                'ps_tanggal' => $request->tglrequest,
                'ps_nama' => $request->nama,
                'ps_divisi' => $request->divisi,
                'ps_jumlah' => $request->jumlah,
            ]);
        }
        return response()->json(['success' => 'Berhasil']);
    }

    public function proses_hapus(Request $request, PesananModel $pesanan){
        
        Storage::delete('public/barang/'. $pesanan->ps_gambar);
        //delete
        $pesanan->delete();
        
        return response()->json(['success' => 'Berhasil']);
    }

    public function verifikasi(){
        $email = 'dwifebrimurcahyo@gmail.com';
        $data = [
            'title' => 'Mail',
            // 'url' => route('request.store'),
            'body' => 'testing mailtrap',
            'url' => ("https://mgmaritim.com")
        ];
        // $data = [
        //     'title' => 'Mail',
        //     // 'url' => route('barang-keluar.store'),
        // ];

        Mail::to($email)->send(new SendMail($data));
        // return 'Berhasil mengirim email!';
    }
}
