<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontOfficeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Assets\AssetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Homepage to Login
Route::get('/', function() {
    return redirect('/login');
});

Route::prefix('/')->middleware(['auth'])->namespace('Dashboard')->group( function(){
    /* Dashboard */
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    /* Assets */
    Route::get('/admin/assets', [AssetController::class, 'index'])->name('assets');
    Route::get('/admin/add-new-asset', [AssetController::class, 'addAsset'])->name('add-new-asset');
});
// Auth
Auth::routes();
