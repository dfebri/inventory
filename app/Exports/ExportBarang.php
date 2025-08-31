<?php
namespace App\Exports;

use App\Models\Admin\WebModel;
use Illuminate\Contracts\View\View;
use App\Models\Admin\BarangModel;
use Maatwebsite\Excel\Concerns\FromView;

class ExportBarang implements FromView {
    /** 
    *@return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $data['data'] = BarangModel::leftJoin('tbl_jenisbarang', 'tbl_jenisbarang.jenisbarang_id', '=', 'tbl_barang.jenisbarang_id')
            ->leftJoin('tbl_satuan', 'tbl_satuan.satuan_id', '=', 'tbl_barang.satuan_id')
            ->leftJoin('tbl_merk', 'tbl_merk.merk_id', '=', 'tbl_barang.merk_id')
            ->orderBy('barang_id')
            ->get();
        $data["title"] = "Excel Barang Stok";
        $data["web"] = WebModel::first();
        $data["tglawal"] = request()->tglawal;
        $data["tglakhir"] = request()->tglakhir;

        return view('Admin.Laporan.StokBarang.excel', $data);
                        
    }
}