<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Auth\ControllerAuthUser;
use App\Http\Controllers\Auth\ControllerAuthPeminjam;

use App\Http\Controllers\Landing\ControllerLanding;

use App\Http\Controllers\Dashboard\ControllerDashboardAdmin;
use App\Http\Controllers\Dashboard\ControllerDashboardPetugas;
use App\Http\Controllers\Dashboard\ControllerDashboardPeminjam;

use App\Http\Controllers\Master\ControllerUser;
use App\Http\Controllers\Master\ControllerPeminjam;
use App\Http\Controllers\Master\ControllerBuku;
use App\Http\Controllers\Master\ControllerKategori;

use App\Http\Controllers\Transaksi\ControllerPeminjaman;
use App\Http\Controllers\Transaksi\ControllerPengembalian;
use App\Http\Controllers\Transaksi\ControllerDenda;

use App\Http\Controllers\Surat\ControllerSuratBebasPustaka;

use App\Http\Controllers\Laporan\ControllerLaporanPeminjaman;
use App\Http\Controllers\Laporan\ControllerLaporanPengembalian;
use App\Http\Controllers\Laporan\ControllerLaporanDenda;
use App\Http\Controllers\Laporan\ControllerLaporanBuku;

use App\Http\Controllers\ZonaPeminjam\ControllerZonaPeminjam;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/

Route::controller(ControllerLanding::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/katalog', 'katalog')->name('katalog');
    Route::get('/detailbuku/{id}', 'detailbuku')->name('detailbuku');
    Route::get('/kategori', 'kategori')->name('kategori');
    Route::get('/tentang', 'tentang')->name('tentang');
    Route::get('/kontak', 'kontak')->name('kontak');
});

/*
|--------------------------------------------------------------------------
| AUTH ADMIN & PETUGAS
|--------------------------------------------------------------------------
*/

Route::controller(ControllerAuthUser::class)->group(function () {

    Route::get('/loginuser', 'login')->name('loginuser');
    Route::post('/loginuser', 'proseslogin')
        ->name('prosesloginuser');
    Route::post('/logoutuser', 'logout')
        ->name('logoutuser');
});

/*
|--------------------------------------------------------------------------
| AUTH PEMINJAM
|--------------------------------------------------------------------------
*/

Route::controller(ControllerAuthPeminjam::class)->group(function () {

    Route::get('/loginpeminjam', 'login')
        ->name('loginpeminjam');
    Route::post('/loginpeminjam', 'proseslogin')
        ->name('prosesloginpeminjam');
    Route::get('/registerpeminjam', 'register')
        ->name('registerpeminjam');
    Route::post('/registerpeminjam', 'prosesregister')
        ->name('prosesregisterpeminjam');
    Route::post('/logoutpeminjam', 'logout')
        ->name('logoutpeminjam');
});

/*
|--------------------------------------------------------------------------
| AREA ADMIN & PETUGAS
|--------------------------------------------------------------------------
*/

Route::middleware('auth:web')->group(function () {
    Route::post('/admin/peminjaman/bayar-denda', [ControllerPeminjaman::class, 'bayarDenda'])
    ->name('admin.peminjaman.bayarDenda');
    Route::post('/pengembalian/bayar-denda/{id}', [ControllerPengembalian::class, 'bayarDenda'])
    ->name('pengembalian.bayarDenda');

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboardadmin', [
        ControllerDashboardAdmin::class,
        'index'
    ])->name('dashboardadmin');
    Route::get('/dashboardpetugas', [
        ControllerDashboardPetugas::class,
        'index'
    ])->name('dashboardpetugas');

    /*
    |--------------------------------------------------------------------------
    | MASTER DATA
    |--------------------------------------------------------------------------
    */

    Route::resource('user', ControllerUser::class);
    Route::resource('peminjam', ControllerPeminjam::class);
    Route::resource('kategori', ControllerKategori::class);
    Route::resource('buku', ControllerBuku::class);

    /*
|--------------------------------------------------------------------------
| CETAK SURAT ANGGOTA PEMINJAM
|--------------------------------------------------------------------------
*/

    Route::get(
        '/peminjam/{id}/surat',
        [ControllerPeminjam::class, 'surat']
    )->name('peminjam.surat');

    /*
    |--------------------------------------------------------------------------
    | APPROVAL PEMINJAM
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/peminjam/{id}/setujui',
        [ControllerPeminjam::class, 'setujui']
    );
    Route::post(
        '/peminjam/{id}/tolak',
        [ControllerPeminjam::class, 'tolak']
    );
    Route::post(
        '/peminjam/{id}/pending',
        [ControllerPeminjam::class, 'pending']
    );

    /*
    |--------------------------------------------------------------------------
    | TRANSAKSI
    |--------------------------------------------------------------------------
    */

    Route::resource('peminjaman', ControllerPeminjaman::class);
    Route::resource('pengembalian', ControllerPengembalian::class);
    Route::resource('denda', ControllerDenda::class);

    /*
    |--------------------------------------------------------------------------
    | SURAT BEBAS PUSTAKA
    |--------------------------------------------------------------------------
    */

    Route::resource('surat', ControllerSuratBebasPustaka::class);

    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */

    Route::prefix('laporan')->group(function () {

        Route::get(
            '/peminjaman',
            [ControllerLaporanPeminjaman::class, 'index']
        )->name('laporan.peminjaman');
        Route::get(
            '/peminjaman/cetak',
            [ControllerLaporanPeminjaman::class, 'cetak']
        )->name('laporan.peminjaman.cetak');
        Route::get(
            '/pengembalian',
            [ControllerLaporanPengembalian::class, 'index']
        )->name('laporan.pengembalian');
        Route::get(
            '/pengembalian/cetak',
            [ControllerLaporanPengembalian::class, 'cetak']
        )->name('laporan.pengembalian.cetak');
        Route::get(
            '/denda',
            [ControllerLaporanDenda::class, 'index']
        )->name('laporan.denda');
        Route::get(
            '/denda/cetak',
            [ControllerLaporanDenda::class, 'cetak']
        )->name('laporan.denda.cetak');
        Route::get(
            '/buku',
            [ControllerLaporanBuku::class, 'index']
        )->name('laporan.buku');
        Route::get(
            '/buku/cetak',
            [ControllerLaporanBuku::class, 'cetak']
        )->name('laporan.buku.cetak');
    });
}); // END AREA ADMIN & PETUGAS

/*
|--------------------------------------------------------------------------
| AREA PEMINJAM
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth:peminjam',
    'middlewarepeminjam'
])->group(function () {
    Route::get('/dashboardpeminjam', [
        ControllerDashboardPeminjam::class,
        'index'
    ])->name('dashboardpeminjam');
    Route::controller(ControllerZonaPeminjam::class)->group(function () {
        Route::get(
            '/riwayatpeminjaman',
            'riwayatpeminjaman'
        )->name('riwayatpeminjaman');
        Route::get(
            '/riwayatpengembalian',
            'riwayatpengembalian'
        )->name('riwayatpengembalian');
        Route::get(
            '/detailpeminjaman/{id}',
            'detailpeminjaman'
        )->name('detailpeminjaman');
        Route::get(
            '/dendasaya',
            'dendasaya'
        )->name('dendasaya');
        Route::get(
            '/suratbebaspustaka',
            'suratbebaspustaka'
        )->name('suratbebaspustaka');
        Route::get(
            '/katalogbuku',
            'katalog'
        )->name('katalogbuku');
        Route::get(
            '/peminjam/detailbuku/{id}',
            'detailbuku'
        )->name('peminjam.detailbuku');
        Route::post(
            '/pinjambuku/{id}',
            'pinjambuku'
        )->name('pinjambuku');
        
    });
    
});


/*
|--------------------------------------------------------------------------
| ERROR TEST
|--------------------------------------------------------------------------
*/

Route::get('/403', fn() => abort(403));
Route::get('/404', fn() => abort(404));
Route::get('/500', fn() => abort(500));
