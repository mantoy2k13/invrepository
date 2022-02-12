<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontOfficeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Assets\AssetController;
use App\Http\Controllers\Dashboard\User\UserController;
use App\Http\Controllers\Dashboard\Settings\SettingsController;
use App\Http\Controllers\Dashboard\Investments\InvestmentController;

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
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    /* Assets */
    Route::get('/assets', [AssetController::class, 'index'])->name('assets');
    Route::get('/view-assets', [AssetController::class, 'assetLists'])->name('asset.lists');
    // Add Asset
    Route::get('/add-new-asset', [AssetController::class, 'addAsset'])->name('asset.create');
    Route::post('/store-asset', [AssetController::class, 'storeAsset'])->name('asset.store');
    // Update Asset
    Route::get('/edit-asset/{id}', [AssetController::class, 'editAsset'])->name('asset.edit');
    Route::post('/update-asset/{id}', [AssetController::class, 'updateAsset'])->name('asset.update');
    // Delete Asset
    Route::post('/delete-asset/', [AssetController::class, 'deleteAsset'])->name('asset.delete');
    // View Asset
    Route::get('/view-asset/{id}', [AssetController::class, 'viewAsset'])->name('asset.view');
    
    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */
    // My Profile
    Route::get('/my-profile', [UserController::class, 'myProfile'])->name('user.profile');
    Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('user.update-profile');
    Route::post('/account-profile', [UserController::class, 'updateAccount'])->name('user.update-account');
    Route::get('/payment-settings',[SettingsController::class, 'payment'])-> name('payment-settings');
    Route::get('/api-settings',[SettingsController::class, 'api'])-> name('api-settings');
    Route::get('/investment',[InvestmentController::class, 'investments'])-> name('investment');
    Route::post('/store-investment', [AssetController::class, 'storeInvestment'])->name('investment.store');
    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    */
    Route::get('/all-users', [UserController::class, 'viewUser'])->name('users.all');
    Route::get('/view-users', [UserController::class, 'userLists'])->name('users.view');
    Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('edit.user');
    Route::post('/update-user', [UserController::class, 'updateUser'])->name('update.user');

    /*
    |--------------------------------------------------------------------------
    | Investments
    |--------------------------------------------------------------------------
    */
    Route::get('/investments', [InvestmentController::class, 'investments'])->name('admin.investments');
    Route::get('/my-investments', [InvestmentController::class, 'myInvestments'])->name('user.my-investments');

});
// Auth
Auth::routes();
