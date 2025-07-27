<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Admin\WebModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\DataTables\DataTables;
use App\Exports\ExportBarangMasuk;
use App\Http\Controllers\Controller;
use App\Models\Admin\BarangMasukModel;
use Maatwebsite\Excel\Facades\Excel;

class LapBarangMasukController extends Controller
{
    public function index(Request $request) {
        $data["title"] = "Lap Barang Masuk";
        return view('Admin.Laporan.BarangMasuk.index', $data);
    }

    public function print(Request $request) 
    {
        if($request->tglawal) {
            $data['data'] = BarangMasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')->whereBetween('bm_tanggal', [$request->tglawal, $request->tglakhir])->orderBy('bm_id', 'DESC')->get();    
        } else {
            $data['data'] = BarangMasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')->orderBy('bm_id', 'DESC')->get();
        }

        $data["title"]= "PDF Barang Masuk";
        $data['web']= WebModel::first();
        $data['tglawal'] = $request->tglawal;
        $data['tglakhir'] = $request->tglakhir;
        return view('Admin.Laporan.BarangMasuk.print', $data);
    }

    public function pdf(Request $request)
    {
        if($request->tglawal) {
            $data['data'] = BarangMasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')->whereBetween('bm_tanggal', [$request->tglawal, $request->tglakhir])->orderBy('bm_id', 'DESC')->get();    
        }else {
            $data['data'] = BarangMasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')->orderBy('bm_id', 'DESC')->get();
        }

        $data["title"] = "PDF Barang Masuk";
        $data['web'] = WebModel::first();
        $data['tglawal'] = $request->tglawal;
        $data['tglakhir'] = $request->tglakhir;
        $pdf = PDF::loadView('Admin.Laporan.BarangMasuk.pdf', $data);

        if($request->tglawal){
            return $pdf->download('lap-bm-'.$request->tglawal.'-'.$request->tglakhir.'.pdf');
        }else{
            return $pdf->download('lap-bm-semua-tanggal.pdf');
        }
    }
    public function excel(Request $request) 
    {
        
        if($request->tglawal){
            return Excel::download(new ExportBarangMasuk,  'lap-stok-'.$request->tglawal.'-'.$request->tglakhir.'.xlsx');
        }else{
            return Excel::download(new ExportBarangMasuk, 'lap-bm-semua-tanggal.xlsx');
        }
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            if ($request->tglakhir == '') {
                $data = BarangMasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')->orderBy('bm_id', 'DESC')->get();
            }else {
                $data = BarangMasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')->whereBetween('bm_tanggal', [$request->tglawal, $request->tglakhir])->orderBy('bm_id', 'DESC')->get();
            }   
            return DataTables::of($data)
                ->addIndexColumn()   
                ->addColumn('tgl', function ($row) {
                    $tgl = $row->bm_tanggal == '' ? '-' : Carbon::parse($row->bm_tanggal)->translatedFormat('d F Y'); 
                    return $tgl;
                })
                ->addColumn('barang', function($row){
                    $barang = $row->barang_id == '' ? '-' : $row->barang_nama;
                    return $barang;
                })
                ->addColumn('currency', function($row) {
                    $currency = $row->bm_harga == '' ? '-' : 'Rp' . number_format($row->bm_harga, 0); 
                    
                    return $currency;
                })

                ->rawColumns(['tgl', 'barang', 'currency'])->make(true);
       }
    }
}