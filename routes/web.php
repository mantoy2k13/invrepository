<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontOfficeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Assets\AssetController;
use App\Http\Controllers\Dashboard\User\UserController;

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
    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |-------------------------------------------------------------------------- 
    */
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    /* Assets */
    Route::get('/admin/assets', [AssetController::class, 'index'])->name('assets');
    Route::get('/admin/view-assets', [AssetController::class, 'assetLists'])->name('asset.lists');
    // Add Asset
    Route::get('/admin/add-new-asset', [AssetController::class, 'addAsset'])->name('asset.create');
    Route::post('/admin/store-asset', [AssetController::class, 'storeAsset'])->name('asset.store');
    // Update Asset
    Route::get('/admin/edit-asset/{id}', [AssetController::class, 'editAsset'])->name('asset.edit');
    Route::post('/admin/update-asset/{id}', [AssetController::class, 'updateAsset'])->name('asset.update');
    // Delete Asset
    Route::post('/admin/delete-asset/', [AssetController::class, 'deleteAsset'])->name('asset.delete');
    // View Asset
    Route::get('/admin/view-asset/{id}', [AssetController::class, 'viewAsset'])->name('asset.view');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |-------------------------------------------------------------------------- 
    */
    // My Profile
    Route::get('/admin/my-profile', [UserController::class, 'myProfile'])->name('user.profile');
    
});
// Auth
Auth::routes();
