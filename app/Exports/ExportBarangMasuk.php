<?php
namespace App\Exports;

use App\Models\Admin\WebModel;
use Illuminate\Contracts\View\View;
use App\Models\Admin\BarangMasukModel;
use Maatwebsite\Excel\Concerns\FromView;

class ExportBarangMasuk implements FromView {
    /** 
    *@return \Illuminate\Support\Collection
    */
    public function view():View
    {
        if (request()->tglawal) {
            $data['data'] = BarangMasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')
                        ->whereBetween('bm_tanggal', [request()->tglawal, request()->tglakhir])
                        ->orderBy('bm_id', 'DESC')
                        ->get();
        } else {
            $data['data'] = BarangMasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')
                        ->orderBy('bm_id', 'DESC')
                        ->get();
        }
        $data["title"] = "Excel Barang Masuk";
        $data["web"] = WebModel::first();
        $data["tglawal"] = request()->tglawal;
        $data["tglakhir"] = request()->tglakhir;

        return view('Admin.Laporan.BarangMasuk.excel', $data);
                        
    }
}