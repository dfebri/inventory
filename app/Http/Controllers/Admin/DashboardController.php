<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Admin\MerkModel;
use App\Models\Admin\RoleModel;
use App\Models\Admin\UserModel;
use Yajra\DataTables\DataTables;
use App\Models\Admin\BarangModel;
use App\Models\Admin\SatuanModel;
use App\Models\Admin\PesananModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Admin\BarangMasukModel;
use App\Models\Admin\JenisBarangModel;
use App\Models\Admin\BarangKeluarModel;
use App\Http\Controllers\Admin\BarangController;

class DashboardController extends Controller
{
    public function index()
    {
        $data["title"] = "Dashboard";
        $data["jenis"] = JenisBarangModel::orderBy('jenisbarang_id', 'DESC')->count();
        $data["satuan"] = SatuanModel::orderBy('satuan_id', 'DESC')->count();
        $data["merk"] = MerkModel::orderBy('merk_id', 'DESC')->count();
        $data["order"] = PesananModel::orderBy('ps_id', 'DESC')->count();
        $data["barang"] = BarangModel::leftJoin('tbl_jenisbarang', 'tbl_jenisbarang.jenisbarang_id', '=', 'tbl_barang.jenisbarang_id')->leftJoin('tbl_satuan', 'tbl_satuan.satuan_id', '=', 'tbl_barang.satuan_id')->leftJoin('tbl_merk', 'tbl_merk.merk_id', '=', 'tbl_barang.merk_id')->orderBy('barang_id', 'DESC')->count();
        $data["bm"] = BarangMasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')->orderBy('bm_id', 'DESC')->count();
        $data["bk"] = BarangKeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')->orderBy('bk_id', 'DESC')->count();
        $data["stok"]= BarangModel::orderBy('barang_id', 'DESC')->count('barang_stok');
        $data["user"] = UserModel::leftJoin('tbl_role', 'tbl_role.role_id', '=', 'tbl_user.role_id')->select()->orderBy('user_id', 'DESC')->count();
        $data["datathismonth"] = BarangKeluarModel::whereMonth('bk_tanggal', date('m'))->count('bk_jumlah');
        setlocale(LC_ALL, 'IND');
        $data["monthName"] = strftime('%B');
        // dd($data["monthName"]);
        $data["jmlmasuk"] = BarangMasukModel::select(DB::raw("barang_kode"))
                            ->leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')
                            ->where('tbl_barangmasuk.barang_kode')
                            ->sum('tbl_barangmasuk.bm_jumlah');                

        // $data["jmlkeluar"] = BarangKeluarModel::select(DB::raw("bk_jumlah"));
        $data["jmlkeluar"] = BarangKeluarModel::select(DB::raw("CAST(SUM(bk_jumlah) as int) as jmlkeluar"))
        ->GroupBy(DB::raw("bk_kode"));
        // ->pluck('jmlkeluar');
        // $data["jmlmasuk"] = BarangMasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')->where('tbl_barangmasuk.barang_kode', '=', row()->barang_kode)->sum('tbl_barangmasuk.bm_jumlah');
        // $data ["jmlkeluar"] = BarangKeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')->where('tbl_barangkeluar.barang_kode', '=', $row->barang_kode)->sum('tbl_barangkeluar.bk_jumlah');
        // $barang
        $data["productsOutStock"] = BarangModel::where('barang_stok', '<', 1, )->paginate(10);
        $data["productsOutStock2"] = BarangModel::leftJoin('tbl_barangmasuk', 'tbl_barangmasuk.barang_kode', '=', 'tbl_barang.barang_kode')->leftJoin('tbl_barangkeluar', 'tbl_barangkeluar.barang_kode', '=', 'tbl_barang.barang_kode')->where('barang_stok', '+','bm_masuk','-','bk_keluar', '<', 2)->paginate(10);
                                    
        // $data['m'] = DB::table('tbl_barangmasuk')->sum('bm_jumlah');
        // $data['k'] = DB::table('tbl_barangkeluar')->sum('bk_jumlah');

        $data["total_pengeluaran"] = BarangKeluarModel::select(DB::raw("CAST(SUM(bk_jumlah) as int) as total_pengeluaran"))
        ->GroupBy(DB::raw("Month(created_at)"));
        // ->pluck('total_pengeluaran');
        // dd($data["total_pengeluaran"]);
        // setlocale(LC_ALL, 'IND');
        $data["bulan"] = BarangKeluarModel::select(DB::raw("MONTHNAME(created_at) as bln, COUNT(bk_id) as id"))
        ->groupByRaw('MONTHNAME(created_at)');
        // ->pluck('bln');
        
        // $data["bulan"] = DB::table("tbl_barangkeluar")
        // ->select(DB::raw("MONTHNAME(created_at) as bulan"))
        // ->orderBy('created_at')
        // ->groupByRaw('MONTHNAME(created_at)')
        // ->pluck('bulan');
        // $data["hbulan"] = strftime('%B');
        // setlocale(LC_ALL, 'IND');

        // $data["bulan"] = DB::table("tbl_barangkeluar")
        // ->select(DB::raw('EXTRACT(MONTHNAME FROM created_at) AS month, COUNT(id) as id'))
        // ->orderBy('created_at')
        // ->groupBy(DB::raw('month'))
        // ->get();
        // ->pluck('month');

        // dd($data["bulan"])
        // BarangKeluarModel::select(DB::raw("MONTHNAME(created_at) as bulan"))
        // ->groupByRaw('MONTHNAME(created_at)')
        // ->pluck('bulan');

        // $devlist = DB::table("users")
        // ->select(DB::raw('EXTRACT(MONTH FROM created_at) AS month, COUNT(id) as id'))
        // ->orderBy('created_at')
        // ->groupBy(DB::raw('month'))
        // ->get();
        // ->toArray();
        // dd($data["bulan"]);
        // $data["total"] = BarangModel::select(DB::raw('tbl_barang.barang_nama as'))
       
        // $label = [];
        // $total = [];

        // $bestProduct = DB::table('tbl_barang')
        // ->addSelect(DB::raw('tbl_barang.barang_nama as name, sum(tbl_barangkeluar.bk_jumlah) as total'))
        // ->leftJoin('tbl_barangkeluar', 'tbl_barangkeluar.barang_kode', 'tbl_barang.barang_kode')
        // ->groupBy('name')
        // ->orderBy('total', 'DESC')
        // ->limit(5)->get(); 
        
        // dd($data["bestProduct"]);

        // if(count($bestProduct)){
        //     foreach($bestProduct as $best){
        //         $label[] = $best->name;
        //         $total[] = (int) $best->total;  
        //     }
        // }else{
        //     $label[] = '';
        //     $total[] = '';
        //     } 

        // dd($data["bestProduct"]);  
            // dd($bestProduct);    
            // dd($label);    
            // dd($total);    
        return view('Admin.Dashboard.index', $data);
    }   
    // public function grafik(){
    //     $label = [];
    //     $total = [];
    //     $bestProduct = DB::table('tbl_barang')
    //     ->addSelect(DB::raw('tbl_barang.barang_nama as name, sum(tbl_barangkeluar.bk_jumlah) as total'))
    //     ->leftJoin('tbl_barangkeluar', 'tbl_barangkeluar.barang_kode', 'tbl_barang.barang_kode')
    //     ->groupBy('name')
    //     ->orderBy('total', 'DESC')
    //     ->limit(5)->get(); 

    //         if(count($bestProduct)){
    //             foreach($bestProduct as $data){
    //                 $label[] = $data->name;
    //                 $total[] = (int) $data->total;
    //             }
    //         }else{
    //             $label[] = '';
    //             $total[] = '';
    //         }          
       
    //         // dd($bestProduct);    
    //         // dd($label);    
    //         // dd($total);    
    //     // dd($bestProduct);
    //     // $bestProductZero = DB::table('tbl_barangkeluar')
    //     //                     ->addSelect(DB::raw('tbl_barang.barang_nama as name, SUM(tbl_barangkeluar.bk_jumlah) as total'))
    //     //                     ->join('tbl_barang', 'tbl_barang.barang_kode', 'tbl_barangkeluar.barang_kode')
    //     //                     ->groupBy('bk_id')
    //     //                     ->orderBy('total', 'DESC')
    //     //                     ->limit(5)->get();
    //     // dd($bestProductZero);

   
    //     return view('Admin.Dashboard.index', $label, $total);
    // }
    
}