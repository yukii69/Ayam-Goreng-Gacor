<?php

use App\Http\Controllers\AndalanController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\TestiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontEndController::class, 'index']);
Route::get('/home', [FrontEndController::class, 'index'])->name('home');

# Menu FAQ
Route::post('/home', [FrontEndController::class, 'sendSubmit'])->name('send.submit');

// -- BACK END --
// Route grup dengan middleware 'auth' dan 'verified'
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/administrator/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');

    // Route grup dengan middleware 'auth' tanpa 'verified'
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Route resource dengan prefix 'administrator'
        Route::prefix('administrator')->group(function () {
            Route::resource('galery', GaleryController::class);            
            Route::resource('andalan', AndalanController::class);            
            Route::resource('banner', BannerController::class);
            Route::resource('menu', MenuController::class);            
            Route::resource('promo', PromoController::class);            
            Route::resource('testi', TestiController::class);            
            Route::resource('user', UserController::class);
            Route::resource('wa', WaController::class);
        });  
    });
});

require __DIR__.'/auth.php';