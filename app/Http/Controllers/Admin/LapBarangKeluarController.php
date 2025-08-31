<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
// use Barryvdh\DomPDF\PDF
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use App\Exports\ExportBarang;
use App\Models\Admin\WebModel;
use Yajra\DataTables\DataTables;
use App\Models\Admin\BarangModel;
use App\Exports\ExportBarangKeluar;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Admin\BarangKeluarModel;
use Illuminate\Support\Facades\View;

class LapBarangKeluarController extends Controller
{
    public function index()
    {
        $data["title"] = "Lap Barang Keluar";
        return view('Admin.Laporan.BarangKeluar.index', $data);
    }

    public function print(Request $request)
    {
        if ($request->tglawal) {
            $data['data'] = BarangKeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')->whereBetween('bk_tanggal', [$request->tglawal, $request->tglakhir])->orderBy('bk_id', 'DESC')->get();
        } else {
            $data['data'] = BarangKeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')->orderBy('bk_id', 'DESC')->get();
        }

        $data["title"] = "Print Barang Masuk";
        $data['web'] = WebModel::first();
        $data['tglawal'] = $request->tglawal;
        $data['tglakhir'] = $request->tglakhir;
        return view('Admin.Laporan.BarangKeluar.print', $data);
    }

    public function pdf(Request $request)
    {
        if ($request->tglawal) {
            $data['data'] = BarangKeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')->whereBetween('bk_tanggal', [$request->tglawal, $request->tglakhir])->orderBy('bk_id', 'DESC')->get();
        } else {
            $data['data'] = BarangKeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')->orderBy('bk_id', 'DESC')->get();
        }

        $data["title"] = "PDF Barang Masuk";
        $data['web'] = WebModel::first();
        $data['tglawal'] = $request->tglawal;
        $data['tglakhir'] = $request->tglakhir;
        $pdf = PDF::loadView('Admin.Laporan.BarangKeluar.PDF', $data);
        
        if($request->tglawal){
            return $pdf->download('lap-bk-'.$request->tglawal.'-'.$request->tglakhir.'.PDF');
        }else{
            return $pdf->download('lap-bk-semua-tanggal.PDF');
        }
        
    }

    public function excel(Request $request) 
    {
        // if ($request->tglawal) {
        //     $data['data'] = BarangKeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')->whereBetween('bk_tanggal', [$request->tglawal, $request->tglakhir])->orderBy('bk_id', 'DESC')->get();
        // } else {
        //     $data['data'] = BarangKeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')->orderBy('bk_id', 'DESC')->get();
        // }
        // // $data['data'] = BarangModel::leftJoin('tbl_jenisbarang', 'tbl_jenisbarang.jenisbarang_id', '=', 'tbl_barang.jenisbarang_id')->leftJoin('tbl_satuan', 'tbl_satuan.satuan_id', '=', 'tbl_barang.satuan_id')->leftJoin('tbl_merk', 'tbl_merk.merk_id', '=', 'tbl_barang.merk_id')->orderBy('barang_id', 'DESC')->get();

        // $data["title"] = "Excel Barang Keluar";
        // $data['web'] = WebModel::first();
        // $data['tglawal'] = $request->tglawal;
        // $data['tglakhir'] = $request->tglakhir;
        // $excel = View::make('Admin.Laporan.BarangKeluar.excel', $data);
        // $excel = Excel::download(new ExportBarang, "barangstok.xlsx");
        // return Excel::download(new ExportBarangKeluar, "barangkeluar.xlsx");
        
        if($request->tglawal){
            return Excel::download(new ExportBarangKeluar,  'lap-stok-'.$request->tglawal.'-'.$request->tglakhir.'.xlsx');
        }else{
            return Excel::download(new ExportBarangKeluar, 'lap-bk-semua-tanggal.xlsx');
        }
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            if ($request->tglawal == '') {
                $data = BarangKeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')->orderBy('bk_id', 'DESC')->get();
            } else {
                $data = BarangKeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')->whereBetween('bk_tanggal', [$request->tglawal, $request->tglakhir])->orderBy('bk_id', 'DESC')->get();
            }
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
                ->addColumn('barang', function ($row) {
                    $barang = $row->barang_id == '' ? '-' : $row->barang_nama;

                    return $barang;
                })
                ->addColumn('currency', function ($row) {
                    $currency = $row->barang_id == '' ? '-' : 'Rp'. number_format($row->barang_harga, 0);
                    
                    return $currency;
                })
                ->rawColumns(['tgl', 'tujuan', 'barang','currency'])->make(true);
        }
    }

}
