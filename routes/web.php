<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AksesorisController;
use App\Http\Controllers\Admin\KategoriBouquetController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\PemesananController as AdminPemesananController;
use App\Http\Controllers\Admin\PembayaranController as AdminPembayaranController;


/*
|--------------------------------------------------------------------------
| USER CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\BouquetController;
use App\Http\Controllers\User\PesananController as UserPesananController;
use App\Http\Controllers\User\PembayaranController as UserPembayaranController; 
use App\Http\Controllers\User\RiwayatController;


/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | DATA CUSTOMER
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'customer',
            CustomerController::class
        );


        /*
        |--------------------------------------------------------------------------
        | DATA PETUGAS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'petugas',
            PetugasController::class
        );


        /*
        |--------------------------------------------------------------------------
        | DATA AKSESORIS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'aksesoris',
            AksesorisController::class
        );


        /*
        |--------------------------------------------------------------------------
        | KATEGORI BOUQUET
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'kategori-bouquet',
            KategoriBouquetController::class
        );


        /*
        |--------------------------------------------------------------------------
        | DATA PEMESANAN ADMIN
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'pemesanan',
            AdminPemesananController::class
        );


        /*
        |--------------------------------------------------------------------------
        | DATA PEMBAYARAN ADMIN
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'pembayaran',
            AdminPembayaranController::class
        );


        /*
        |--------------------------------------------------------------------------
        | RIWAYAT PEMESANAN ADMIN
        |--------------------------------------------------------------------------
        */

       Route::get('/riwayat', [AdminPemesananController::class, 'riwayat'])
    ->name('riwayat.index');
    });


/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/

Route::prefix('user')
    ->name('user.')
    ->middleware(['auth', 'role:user'])
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD USER
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            [UserController::class, 'dashboard']
        )->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | PESANAN USER
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'pesanan',
            UserPesananController::class
        );


        /*
        |--------------------------------------------------------------------------
        | STATUS BOUQUET USER
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/bouquet',
            [BouquetController::class, 'index']
        )->name('bouquet.index');


        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN USER
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/pembayaran/{pemesanan}',
            [UserPembayaranController::class, 'index']
        )->name('pembayaran.index');

        Route::post(
            '/pembayaran/{pemesanan}',
            [UserPembayaranController::class, 'store']
        )->name('pembayaran.store');

    Route::get(
    '/riwayat',
    [RiwayatController::class, 'index']
)->name('riwayat.index');
    
    });

require __DIR__ . '/auth.php';
