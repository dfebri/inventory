

{{--  
use App\Models\Admin\BarangMasukModel;
use App\Models\Admin\BarangkeluarModel;

$barang = BarangkeluarModel::orderBy('bk_id', 'DESC')->get(); --}}

{{-- // $result = array(
//     "bk_id" => $row->bk_id,
//     "bk_kode" => $row->bk_kode,
//     "barang_kode" => $row->barang_kode,
//     "bk_tanggal" => $row->bk_tanggal,
//     "bk_tujuan" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->bk_tujuan)),
//     "bk_jumlah" => $row->bk_jumlah,
//     // "bk_jumlah" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_',$row->bk_jumlah)),
//  --}}

{{-- $data["bk"] = BarangkeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')->orderBy('bk_id', 'DESC')->count(); --}}
@component('mail::message')
Confirm Request
@component('mail::button', ['url'=>$data['url']])
Confirm
@endcomponent
{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}
{{-- @component(BarangkeluarModel::orderBy('bk_id', 'DESC')->get()) --}}

Thanks,<br>
{{ config('app.name') }}
{{-- </x-mail::message> --}}
@endcomponent