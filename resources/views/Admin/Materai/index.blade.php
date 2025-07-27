@extends ('Master.Layouts.app' , ['title' => $title])

@section('content')
    <!-- PAGE HEADER -->
    <div class= "page-header">
        <h1 class="page-title">Materai Request</h1>
        </div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-gray">Admin</li>
                <li class="breadcrumb-item active" aria-current="page">Materai</li>
            </ol>
        </div>
    </div>

    <!-- Table -->
     <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h3 class="cad-title">Data</h3>
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
                                <th class="broder-bottom 0" width="1%">No</th>
                                <th class="border-bottom 0">Nama User</th>
                                <th class="border-bottom 0">Barang Kode</th>
                                <th class="border-bottom 0">Tanggal</th>
                                <th class="border-bottom 0">Stock</th>
                                <th class="border-bottom 0">Take</th>
                                <th class="border-bottom 0">Penggunaan</th>
                                <th class="border-bottom 0" width="1%">Action</th>
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

    <script>
        
    </script>