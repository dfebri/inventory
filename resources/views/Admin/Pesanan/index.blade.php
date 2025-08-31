@extends('Master.Layouts.app', ['title' => $title])

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Order Barang</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-gray">Admin</li>
                <li class="breadcrumb-item active" aria-current="page">Order</li>
            </ol>
        </div>
    </div>

    <!-- Table -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h3 class="card-title">Data</h3>
                    @if ($hakTambah > 0)
                    <div>
                        <a class="modal-effect btn btn-primary-light" onclick="generateID()" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modaldemo8">Tambah Data <i class="fe fe-plus"></i></a>
                    </div>
                @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-1" width="100%" class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">                           
                            <thead>
                                <th class="border-bottom-0" width="1%">No</th>
                                <th class="border-bottom-0">Gambar</th>
                                <th class="border-bottom-0">Tanggal Request </th>
                                <th class="border-bottom-0">Kode Request</th>
                                <th class="border-bottom-0">Nama Barang</th>
                                <th class="border-bottom-0">User</th>
                                <th class="border-bottom-0">Dept</th>
                                <th class="border-bottom-0">Jumlah</th>
                                <th class="border-bottom-0" width="1%">Action</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- END ROW -->
    @include('Admin.Pesanan.tambah')
    @include('Admin.Pesanan.edit')
    @include('Admin.Pesanan.hapus')
    @include('Admin.Pesanan.gambar')
    @include('Admin.Pesanan.barang')
    

    <script>
        function generateID(){
            id = new Date().getTime();
            $("input[name='reqkode']").val("ORD-"+id);
        }
        function update(data) {
            $("input[name='idrequestU']").val(data.ps_id);
            $("input[name='reqkodeU']").val(data.ps_kode);
            // $("input[name='kdbarangU']").val(data.barang_kode);
            $("input[name='tglrequestU']").val(data.ps_tanggal);
            $("input[name='namaU']").val(data.ps_nama.replace(/_/g, ' '));
            $("input[name='divisiU']").val(data.ps_divisi);
            $("input[name='barangU']").val(data.ps_barang.replace(/_/g, ' '));
            $("input[name='jumlahU']").val(data.ps_jumlah); 
            if(data.ps_gambar != 'image.png'){
                $("#outputImgU").attr("src", "{{asset('storage/barang/')}}"+"/"+data.ps_gambar);    
            }

            getbarangbyidU(data.barang_kode);

            $("input[name='tglrequestU").bootstrapdatepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            }).bootstrapdatepicker("update", data.ps_tanggal);
                
        }

        function hapus(data) {
            $("input[name='idrequest']").val(data.ps_id);
            $("#vrequest").html("Kode " + "<b>" + data.ps_kode.replace(/_/g, ' ')+ "</b>");
        }

        function gambar(data) {
            if(data.ps_gambar != 'image.png'){
                $("#outputImgG").attr("src", "{{asset('storage/barang/')}}"+"/"+data.ps_gambar);
            }else{
                $("#outputImgG").attr("src", "{{url('/assets/default/barang/image.png')}}");
            }
        }
        function validasi(judul, status) {
            swal({
                title: judul,
                type: status,
                confirmButtonText: "Iya."
            });
        }
    </script>
@endsection

    @section('scripts')
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table;
            $(document).ready(function() {
                //datatables
                table = $('#table-1').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "info": true,
                    "order": [],
                    "stateSave": true,
                    "scrollX": true,
                    "lengthMenu": [
                        [5, 10, 25, 50, 100],
                        [5, 10, 25, 50, 100]
                    ],
                    "pageLength": 10,
                    lengthChange: true,
                    "ajax": {
                        "url": "{{route('order.getrequest')}}",
                    },
                    "columns": [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            searchable: false
                        },
                        {
                            data: 'img',
                            name: 'ps_gambar',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'tgl',
                            name: 'ps_tanggal',
                        },
                        {
                            data: 'ps_kode',
                            name: 'ps_kode',
                        },
                        {
                            data: 'barang',
                            name: 'ps_barang',
                        },
                        {
                            data: 'nama',
                            name: 'ps_nama',
                        },
                        {
                            data: 'divisi',
                            name: 'ps_divisi',
                        },
                        {
                            data: 'jumlah',
                            name: 'ps_jumlah',
                        },                
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],

                });
            });
        </script>
    @endsection

