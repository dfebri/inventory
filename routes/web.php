<?php


// use App\Http\Controllers\KirimEmailController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\KirimMailController;
use App\Http\Controllers\Admin\MerkController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Master\MenuController;
use App\Http\Controllers\Master\RoleController;
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\SatuanController;
use App\Http\Controllers\Master\AksesController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\CustomerController;
// use App\Http\Controllers\Admin\BarangMasukController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Master\AppreanceController;
// use App\Http\Controllers\Admin\BarangMasukController;
use App\Http\Controllers\Admin\BarangMasukController;
// use App\Http\Controllers\Admin\BarangMasukController;
use App\Http\Controllers\Admin\JenisBarangController;
use App\Http\Controllers\Admin\BarangKeluarController;
use App\Http\Controllers\Admin\LapStokBarangController;
use App\Http\Controllers\Admin\LapBarangMasukController;
use App\Http\Controllers\Admin\LapBarangKeluarController;
use App\Http\Controllers\Admin\MateraiModelController;
use App\Http\Controllers\MateraiModelController as ControllersMateraiModelController;
use PhpParser\Node\Stmt\Return_;

// use App\Http\Controllers\MateraiModelController as ControllersMateraiModelController;

// use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/maintenance/on', function () {
    Artisan::call('down', [
        '--secret' => 'secret-mod'
    ]);
    return 'Application is now in maintenance mode.';
});

Route::get('/maintenance/off', function () {
    Artisan::call('up');
    return 'Application is now live.';
});


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return 'Cache cleared';
});

Route::get('/fix-storage', function () {
    $target = realpath(base_path('storage/app/public'));
    $link = $_SERVER['DOCUMENT_ROOT'] . '/storage';

    // kalau sudah ada folder/link, hapus dulu
    if (file_exists($link) || is_link($link)) {
        rename($link, $link.'_old_'.time());
    }

    if (symlink($target, $link)) {
        return "✅ Symlink berhasil: $link → $target";
    } else {
        return "❌ Gagal bikin symlink. Hosting mungkin blokir fungsi symlink()";
    }
});

Route::middleware (['preventBackHistory'])->group(function () {
    Route::get('/admin/login', [LoginController::class, 'index'])->middleware('useractive');
    Route::post('/admin/proseslogin', [LoginController::class, 'proseslogin'])->middleware('useractive');
    Route::get('admin/logout', [LoginController::class, 'logout']);
// Route::get('admin/proseslogin', [LoginController::class, 'proseslogin']);
// Route::get('admin/index', [LoginController::class, 'logout']);
});

//admin
Route::group(['middleware' => 'userlogin'], function() {

    Route::get('/admin/profile/{user}', [UserController::class, 'profile']);
    Route::get('/admin/updatepassword/{user}', [UserController::class, 'updatePassword']);
    Route::get('/admin/updateProfile/{user}', [UserController::class, 'updateProfile']);
    
    Route::middleware(['checkRoleUser:/dashboard, menu'])->group(function(){
        Route::get('/',[DashboardController::class, 'index']);
        Route::get('/admin', [DashboardController::class, 'index']);
        Route::get('/admin/dashboard', [DashboardController::class, 'index']);
        // Route::get('/admin/dashboardg', [DashboardController::class, 'grafik']);
    });

    Route::middleware(['checkRoleUser:/jenisbarang, submenu'])->group(function(){
        Route::get('/admin/jenisbarang', [JenisBarangController::class, 'index']);
        // Route::get('/admin/jenisbarang/show/', [JenisBarangController::class, 'show'])->name('jenisbarang.getjenisbarang');
        Route::get('/admin/jenisbarang/show/', [JenisBarangController::class, 'show'])->name('jenisbarang.getjenisbarang');
        Route::post('/admin/jenisbarang/proses_tambah/', [JenisBarangController::class, 'proses_tambah'])->name('jenisbarang.store');
        Route::post('/admin/jenisbarang/proses_ubah/{jenisbarang}',[JenisBarangController::class, 'proses_ubah']);
        Route::post('/admin/jenisbarang/proses_hapus/{jenisbarang}', [JenisBarangController::class, 'proses_hapus']);
    });

    Route::middleware(['checkRoleUser:/satuan, submenu'])->group(function() {
        Route::get('/admin/satuan', [SatuanController::class, 'index']);
        Route::get('/admin/satuan/show', [SatuanController::class, 'show'])->name('satuan.getsatuan');
        Route::post('/admin/satuan/proses_tambah', [SatuanController::class, 'proses_tambah'])->name('satuan.store');
        Route::post('/admin/satuan/proses_ubah/{satuan}', [SatuanController::class, 'proses_ubah']);
        Route::post('/admin/satuan/proses_hapus/{satuan}', [SatuanController::class, 'proses_hapus']);
    });

    Route::middleware(['checkRoleUser:/merk, submenu'])->group(function() {
        Route::get('/admin/merk', [MerkController::class, 'index']);
        Route::get('/admin/merk/show', [MerkController::class, 'show'])->name('merk.getmerk');
        Route::post('/admin/merk/proses_tambah', [MerkController::class, 'proses_tambah'])->name('merk.store');
        Route::post('/admin/merk/proses_ubah/{merk}', [MerkController::class, 'proses_ubah']);
        Route::post('/admin/merk/proses_hapus/{merk}', [MerkController::class, 'proses_hapus']);
    });

    Route::middleware(['checkRoleUser:/barang, submenu'])->group(function(){
        Route::get('/admin/barang', [BarangController::class, 'index']);
        Route::get('/admin/barang/show', [BarangController::class, 'show'])->name('barang.getbarang');
        Route::post('/admin/barang/proses_tambah/', [BarangController::class, 'proses_tambah'])->name('barang.store');
        Route::post('/admin/barang/proses_hapus/{barang}', [BarangController::class,'proses_hapus']);
        Route::post('/admin/barang/proses_ubah/{barang}', [BarangController::class, 'proses_ubah']);
    });
    
    Route::middleware(['checkRoleUser:/barang-masuk,submenu'])->group(function () {
        // Barang Masuk
        // Route::resource('/admin/barang-masuk', \App\Http\Controllers\Admin\BarangmasukController::class);
        Route::get('/admin/barang-masuk', [BarangMasukController::class, 'index']);
        Route::get('/admin/barang-masuk/show/', [BarangMasukController::class, 'show'])->name('barang-masuk.getbarang-masuk');
        Route::post('/admin/barang-masuk/proses_tambah/', [BarangMasukController::class, 'proses_tambah'])->name('barang-masuk.store');
        Route::post('/admin/barang-masuk/proses_ubah/{barangmasuk}', [BarangMasukController::class, 'proses_ubah']);
        Route::post('/admin/barang-masuk/proses_hapus/{barangmasuk}', [BarangMasukController::class, 'proses_hapus']);
        Route::get('/admin/barang/getbarang/{id}', [BarangController::class, 'getbarang']);
        Route::get('/admin/barang/listbarang/{param}', [BarangController::class, 'listbarang']);
    });

    Route::middleware(['checkRoleUser:/barang-keluar, submenu'])->group(function (){
        //Barang Keluar
        Route::get('/admin/barang-keluar', [BarangKeluarController::class, 'index']);
        Route::get('/admin/barang-keluar/show', [BarangKeluarController::class, 'show'])->name('barang-keluar.getbarang-keluar');
        Route::post('/admin/barang-keluar/proses_tambah', [BarangKeluarController::class, 'proses_tambah'])->name('barang-keluar.store');
        Route::post('/admin/barang-keluar/proses_ubah/{barangkeluar}', [BarangKeluarController::class, 'proses_ubah']);
        Route::post('/admin/barang-keluar/proses_hapus/{keluar}', [BarangKeluarController::class, 'proses_hapus']);
    });

    Route::middleware(['checkRoleUser:/order, submenu'])->group(function() {
        //Pesanan
        Route::get('/admin/order', [PesananController::class, 'index']);
        Route::get('/admin/order/show', [PesananController::class, 'show'])->name('order.getrequest');
        Route::post('/admin/order/proses_tambah', [PesananController::class, 'proses_tambah' ])->name('order.store');
        Route::post('/admin/order/proses_hapus/{pesanan}', [PesananController::class, 'proses_hapus']);
        Route::post('/ad/proses_ubah/{pesanan}',[PesananController::class, 'proses_ubah']);
        // Route::get('/admin/request/mail', [PesananController::class, 'verifikasi']);
        Route::get('/admin/barang/getbarang/{id}', [BarangController::class, 'getbarang']);
        Route::get('/admin/barang/listbarang/{param}', [BarangController::class, 'listbarang']);
    });

    Route::middleware(['checkRoleUser:/materai, menu'])->group(function() {
        //Order-Materai
        Route::get('/admin/materai', [MateraiModelController::class, 'index']);
        // Route::get('/admin/materai', [ControllersMateraiModelController::class, 'index]);
        Route::get('/admin/admin', [MateraiModelController::class, 'proses_tambah'])->name('materai.store');
    });

    Route::middleware(['checkRoleUser:/lap-barang-masuk, submenu'])->group(function() {
       //Lap-Barang-Masuk
        Route::get('/admin/lap-barang-masuk',[LapBarangMasukController::class, 'index']);
        Route::get('/admin/lapbarangmasuk/print/', [LapBarangMasukController::class, 'print'])->name('lap-bm.print');
        Route::get('/admin/lapbarangmasuk/pdf/', [LapBarangMasukController::class, 'pdf'])->name('lap-bm.pdf');
        Route::get('/admin/lapbarangmasuk/excel/', [LapBarangMasukController::class, 'excel'])->name('lap-bm.excel');
        Route::get('/admin/lap-barang-masuk/show/', [LapBarangMasukController::class,'show'])->name('lap-bm.getlap-bm');
    });

    Route::middleware(['checkRoleUser:/lap-barang-keluar, submenu'])->group(function(){
        //Lap barang keluar
        Route::get('/admin/lap-barang-keluar', [LapBarangKeluarController::class, 'index']);
        Route::get('/admin/lapbarangkeluar/print/', [LapBarangKeluarController::class, 'print'])->name('lap-bk.print');
        Route::get('/admin/lapbarangkeluar/pdf/', [LapBarangKeluarController::class, 'pdf'])->name('lap-bk.pdf');
        Route::get('/admin/lapbarangkeluar/excel/', [LapBarangKeluarController::class, 'excel'])->name('lap-bk.excel');
        Route::get('/admin/lapbarangkeluar/show/', [LapBarangKeluarController::class, 'show'])->name('lap-bk.getlap-bk');
    });

    Route::middleware(['checkRoleUser:/lap-stok-barang, submenu'])->group(function() {
        //Lap stok barang
        Route::get('/admin/lap-stok-barang', [LapStokBarangController::class, 'index']);
        Route::get('/admin/lapstokbarang/print/', [LapStokBarangController::class, 'print'])->name('lap-sb.print');
        Route::get('/admin/lapstokbarang/pdf/', [LapStokBarangController::class, 'pdf'])->name('lap-sb.pdf');
        Route::get('/admin/lapstokbarang/excel/', [LapStokBarangController::class, 'excel'])->name('lap-sb.excel');
        Route::get('/admin/lapstokbarang/show/', [LapStokBarangController::class, 'show'])->name('lap-sb.getlap-sb');
    }); 

});



