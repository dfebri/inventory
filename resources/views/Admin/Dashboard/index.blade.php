@extends('Master.Layouts.app', ['title' => $title])

@section('content')
    
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-gray">{{Session::get('user')->role_title}}</li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
<div class="modal-body">
<script src="{{ asset('assets/js/sample-chart.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
<!-- ROW 1 OPEN -->
<div class="row">
    {{-- <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-primary img-card box-primary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{ $barang }}</h2>
                        <p class="text-white mb-0">Barang Stok</p>
                        <a style="color:azure" href="https://atkwk.my.id/barang">More Info <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="ms-auto"> <i class="fe fe-package text-white fs-40 me-2 mt-2"></i> </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- COL END -->
    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-danger img-card box-danger-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{ $order }}</h2>
                        <p class="text-white mb-0">Order Barang</p>
                        <a style = "color:azure" href="https://atkwk.my.id/admin/order">More Info <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="ms-auto"> <i class="fe fe-shopping-bag text-white fs-40 me-2 mt-2"></i> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- COL END -->
    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-orange img-card box-orange-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{ $bm }}</h2>
                        <p class="text-white mb-0">Barang Masuk</p>
                        <a style = "color: azure" href="https://atkwk.my.id/admin/barang-masuk">More Info <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class ="ms-auto"> <i class="fe fe-repeat text-white fs-40 me-2 mt-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- COL END -->
    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-green img-card box-green-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{ $bk }}</h2>
                        <p class="text-white mb-0">Barang Keluar </p>
                        <a style = "color:azure" href="hhttps://atkwk.my.id/admin/barang-keluar">More Info <i class="bi bi-arrow-right"></i></a>
                        {{-- <a href="http://127.0.0.1:8000/admin/barang"></a> --}}
                    </div>
                    <div class ="ms-auto"> <i class="fe fe-repeat text-white fs-40 me-2 mt-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-primary img-card box-primary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{ $datathismonth }}</h2>
                        <p class="text-white mb-0">Request User Bulan ini</p>
                        {{-- <a style = "color:azure" href="http://127.0.0.1:8000/admin/barang-keluar">Detail Info <i class="bi bi-arrow-right"></i></a> --}}
                        {{-- <a href="http://127.0.0.1:8000/admin/barang"></a> --}}
                    </div>
                    <div class ="ms-auto"> <i class="fe fe-user text-white fs-40 me-2 mt-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Grafik Pengeluaran Barang</h3>
          <canvas id="myChart" width="400" height="180"></canvas>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Grafik Request User</h3>
          <canvas id="barChart" width="400" height="180"></canvas>
        </div>
      </div>
    </div>
</div>


<script>
    var datareq = {!! json_encode($order) !!}
    var databk = {!! json_encode($bk) !!}
    var databm = {!! json_encode($bm) !!}
    var pengeluaran = {!! json_encode($total_pengeluaran) !!}
    var bulan = {!! json_encode($bulan) !!}
</script>  
<script>
        document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('myChart');
        const btr = document.getElementById('barChart');
        
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: bulan,           
                datasets: [{
                    label: 'Pengeluaran Barang Bulanan',
                    data: pengeluaran,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1       
                }],
            }
        });
        const barChart = new Chart(btr, {
            type: 'bar',
            data: {
                labels: ['Order', 'Barang Masuk', 'Barang Keluar',],
                datasets: [{
                    label: 'Request User',
                    data: [datareq, databm, databk],
                    backgroundColor: [
                        'rgba(0, 0, 255, 0.2)',
                        'rgba(0, 0, 255, 0.2)',
                        'rgba(0, 0, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(100, 159, 237, 1)',
                        'rgba(100, 159, 237, 1)',
                        'rgba(100, 159, 237, 1)',
                    ],
                    borderWidth: 1
                }],
            }
        });
    },
);
</script>

@endsection