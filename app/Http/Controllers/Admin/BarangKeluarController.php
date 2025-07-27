<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Models\Admin\AksesModel;
use Yajra\DataTables\DataTables;
use App\Models\Admin\BarangModel;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\BarangMasukModel;
use App\Models\Admin\BarangKeluarModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Notification;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["title"] = "Barang Keluar";
        $data["hakTambah"] = AksesModel::leftJoin('tbl_submenu', 'tbl_submenu.submenu_id', '=', 'tbl_akses.submenu_id')->where(array('tbl_akses.role_id' => Session::get('user')->role_id, 'tbl_submenu.submenu_judul' => 'Barang Keluar', 'tbl_akses.akses_type' => 'create'))->count();
        return view('Admin.BarangKeluar.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = BarangKeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')->orderBy('bk_id', 'DESC')->get();
            return DataTables::of($data)
            ->addIndexColumn()
                ->addColumn('tgl', function ($row) {
                    $tgl = $row->bk_tanggal == '' ? '-' : Carbon::parse($row->bk_tanggal)->translatedFormat('d F Y');
                    return $tgl;
                })
                ->addColumn('tujuan', function ($row) {
                    $tujuan = $row->bk_tujuan == '' ? '-' : $row->bk_tujuan;
                    return $tujuan;
                })
                ->addColumn('user', function ($row) {
                    $user = $row->bk_user == '' ? '-' : $row->bk_user;
                    return $user;
                })
                ->addColumn('jml', function ($row) {
                    $jml = $row->bk_jumlah == '' ? '-' : $row->bk_jumlah;
                    return $jml;
                })
                ->addColumn('barang', function ($row) {
                    $barang = $row->barang_id == '' ? '-' : $row->barang_nama;
                    return $barang;
                })
                ->addColumn('barangstok', function ($row) use ($request) {
                    $barangstok = $row->barang_id == '' ? '-' : $row->barang_stok;
                    if ($request->tglawal == '') {
                        $jmlmasuk = BarangMasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')->where('tbl_barangmasuk.barang_kode', '=', $row->barang_kode)->sum('tbl_barangmasuk.bm_jumlah');
                    } else {
                        $jmlmasuk = BarangMasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')->whereBetween('bm_tanggal', [$request->tglawal, $request->tglakhir])->where('tbl_barangmasuk.barang_kode', '=', $row->barang_kode)->sum('tbl_barangmasuk.bm_jumlah');
                    }


                    if ($request->tglawal) {
                        $jmlkeluar = BarangKeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')->whereBetween('bk_tanggal', [$request->tglawal, $request->tglakhir])->where('tbl_barangkeluar.barang_kode', '=', $row->barang_kode)->sum('tbl_barangkeluar.bk_jumlah');
                    } else {
                        $jmlkeluar = BarangKeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')->where('tbl_barangkeluar.barang_kode', '=', $row->barang_kode)->sum('tbl_barangkeluar.bk_jumlah');
                    }

                    $totalstok = $barangstok + ($jmlmasuk - $jmlkeluar);
                    if($totalstok == 0){
                        $result = '<span class="">'.$totalstok.'</span>';
                    }else if($totalstok > 0){
                        $result = '<span class="text-success">'.$totalstok.'</span>';
                    }else{
                        $result = '<span class="text-danger">'.$totalstok.'</span>';
                    }
                    return $result;
                })
                
                ->addColumn('action', function ($row) {
                    $array = array(
                        "bk_id" => $row->bk_id,
                        "bk_kode" => $row->bk_kode,
                        "barang_kode" => $row->barang_kode,
                        "bk_tanggal" => $row->bk_tanggal,
                        "bk_tujuan" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->bk_tujuan)),
                        "bk_user" => $row->bk_tanggal,
                        "bk_jumlah" => $row->bk_jumlah,

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
                        <div class="g-2">
                        <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=hapus(' . json_encode($array) . ')><span class="fe fe-trash-2 fs-14"></span></a>
                        </div>
                        ';
                    } else {
                        $button .= '-';
                    }
                    return $button;
                })
                ->rawColumns(['action', 'tgl', 'tujuan', 'user', 'jml', 'barang', 'barangstok'])->make(true);
        }
    }
    public function proses_tambah(Request $request)
    {
        // dd($request);
        for($i=0; $i<count($request->barang); $i++){
            BarangKeluarModel::create([
                'bk_kode' => $request->bkkode,
                'bk_tanggal'=> $request->tglkeluar,  
                'barang_stok' => $request->barangstok,
                'bk_tujuan'=> $request->tujuan,
                'bk_user'=> $request->user,
                'barang_kode' => $request->barang[$i],
                'bk_jumlah' => $request->jml[$i],
            ]);
        } 
        // $data = BarangKeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')->orderBy('bk_id', 'DESC')->get();			     
        // Mail::to('dwifebrimurcahyo@gmail.com')->send(new SendMail($data));
        
        $today = Carbon::now();
        $data = BarangKeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')->where('tbl_barangkeluar.updated_at', '>=', $today)
        ->orderBy('tbl_barangkeluar.updated_at', 'DESC')->get();
        // Mail::to('febri.murcahyo@mgmaritim.com')->send(new SendMail($data));
        // dd($data);

    }
        
    public function proses_ubah(Request $request, BarangKeluarModel $barangkeluar)
    {
        //Update data
        $barangkeluar->update([
            'bk_tanggal' => $request->tglkeluar,
            'bk_kode' => $request->bkkode,
            'barang_kode' => $request->barang,
            'bk_tujuan' => $request->tujuan,
            'bk_jumlah' => $request->jml,
        ]);
        return response()->json(['success' => 'Berhasil']);
    }

    public function proses_hapus(Request $request, BarangKeluarModel $keluar)
    {
        $keluar->delete();
        return response()->json(['success' => 'Berhasil']);
    }

    // public function mail(){
    //     // $data = "dwifebrimurcahyo@gmail.com";
    //     $email = 'dwifebrimurcahyo@gmail.com';
    //     $data = [
    //         'title' => 'Mail',
    //         'url' => route('barang-keluar.store'),
    //     ];
    //     Mail::to($email)->send(new SendMail($data));
    //     // return 'Berhasil mengirim email!';

    // }
    public function Mail(array $data){
        // console.log(Mail)
        // $barangkeluar = BarangkeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')->orderBy('bk_id', 'DESC')->get();
        // $user = BarangkeluarModel::create([
        //     'bk_tujuan' => $user ['$bk_tujuan'],
        //     'bk_jumlah' => $user ['bk_jumlah'],
        // ]);
        // $user->notify(new SendMail());

        // return $user;
        
        // $email = 'dwifebrimurcahyo@gmail.com';
        $user = BarangKeluarModel::create([
            'bk_id' => $data['bk_id'], 
            'bk_kode' => $data['bk_kode'], 
            'barang_kode' => $data['barang_kode'], 
            'bk_tanggal' => $data['bk_tanggal'], 
            'bk_tujuan' => $data['bk_tujuan'], 
            'bk_jumlah' => $data['bk_jumlah'], 
            // 'url' => url('http://127.0.0.1:8000/admin/barang-keluar'),
        ]);
        $user->notify(new InvoicePaid($user));
        return $user;

        // ])
                
        //     $array = array(
        //                 "bk_id" => $row->bk_id,
        //                 "bk_kode" => $row->bk_kode,
        //                 "barang_kode" => $row->barang_kode,
        //                 "bk_tanggal" => $row->bk_tanggal,
        //                 "bk_tujuan" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->bk_tujuan)),
        //                 "bk_jumlah" => $row->bk_jumlah,
        //                 "bk_jumlah" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_',$row->bk_jumlah)),
        //     ),
        //     'title' => 'Selamat datang!',
        //     'url' => url('http://127.0.0.1:8000/admin/barang-keluar'),
        // ];
        // Mail::to($email)->send(new SendMail($user));
        // return 'Berhasil mengirim email!';
    }

    public function test(){

        // $data = BarangkeluarModel::find('bk_tujuan')->where('bk_id = 48', 'DESC')->get();   
        // $data = BarangkeluarModel::orderBy('bk_id', 'DESC')->get();
        $data = BarangKeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')->orderBy('bk_id', 'DESC')->get();
        // $user = BarangkeluarModel::find('bk')
        // mail::to('dwifebrimurcahyo@gmail.com')->send(new'email.testemail');
        Mail::to('dwifebrimurcahyo@gmail.com')->send(new SendMail($data));
    }
}