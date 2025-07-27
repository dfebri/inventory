<?php
namespace App\Exports;

use App\Models\Admin\WebModel;
use Illuminate\Contracts\View\View;
use App\Models\Admin\BarangKeluarModel;
use Maatwebsite\Excel\Concerns\FromView;

class ExportBarangKeluar implements FromView {
    /** 
    *@return \Illuminate\Support\Collection
    */
    public function view():View
    {
        if (request()->tglawal) {
            $data['data'] = BarangKeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')
                        ->whereBetween('bk_tanggal', [request()->tglawal, request()->tglakhir])
                        ->orderBy('bk_id','DESC')
                        ->get();
        } else {
            $data['data'] = BarangKeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')
                        ->orderBy('bk_id', 'DESC')
                        ->get();
        }
        $data["title"] = "Excel Barang Keluar";
        $data["web"] = WebModel::first();
        $data["tglawal"] = request()->tglawal;
        $data["tglakhir"] = request()->tglakhir;

        return view('Admin.Laporan.BarangKeluar.Excel', $data);
                        
    }
}