<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;            
use App\Http\Controllers\KaryawanController;            
use App\Http\Controllers\PelamarController;            
use App\Http\Controllers\UserController;            
use App\Http\Controllers\IzinController;            
use App\Http\Controllers\CutiController;            
use App\Http\Controllers\SanksiController;            
use App\Http\Controllers\RewardController;            
use App\Http\Controllers\PhkController;            
            

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');

	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 

	Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
	Route::get('/karyawancreate', [KaryawanController::class, 'create'])->name('karyawancreate');
	Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
	Route::get('/karyawanedit/{id}', [KaryawanController::class, 'edit'])->name('karyawanedit');
	Route::put('/karyawan/update/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
	Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');
	
	Route::get('/pelamar', [PelamarController::class, 'index'])->name('pelamar');
	Route::get('/pelamarcreate', [PelamarController::class, 'create'])->name('pelamarcreate');
	Route::post('/pelamar', [PelamarController::class, 'store'])->name('pelamar.store');
	Route::get('/pelamaredit/{id}', [PelamarController::class, 'edit'])->name('pelamaredit');
	Route::put('/pelamar/update/{id}', [PelamarController::class, 'update'])->name('pelamar.update');
	Route::delete('/pelamar/{id}', [PelamarController::class, 'destroy'])->name('pelamar.destroy');
	
	Route::get('/user', [UserController::class, 'index'])->name('user');
	Route::get('/usercreate', [UserController::class, 'create'])->name('usercreate');
	Route::post('/user', [UserController::class, 'store'])->name('user.store');
	Route::get('/useredit/{id}', [UserController::class, 'edit'])->name('useredit');
	Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
	Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
	
	Route::get('/izin', [IzinController::class, 'index'])->name('izin');
	Route::get('/izincreate', [IzinController::class, 'create'])->name('izincreate');
	Route::post('/izin', [IzinController::class, 'store'])->name('izin.store');
	Route::get('/izinedit/{id}', [IzinController::class, 'edit'])->name('izinedit');
	Route::put('/izin/update/{id}', [IzinController::class, 'update'])->name('izin.update');
	Route::delete('/izin/{id}', [IzinController::class, 'destroy'])->name('izin.destroy');
	Route::get('izin/getdata/{id}', [IzinController::class, 'getdata']);
	
	Route::get('/cuti', [CutiController::class, 'index'])->name('cuti');
	Route::get('/cuticreate', [CutiController::class, 'create'])->name('cuticreate');
	Route::post('/cuti', [CutiController::class, 'store'])->name('cuti.store');
	Route::get('/cutiedit/{id}', [CutiController::class, 'edit'])->name('cutiedit');
	Route::put('/cuti/update/{id}', [CutiController::class, 'update'])->name('cuti.update');
	Route::delete('/cuti/{id}', [CutiController::class, 'destroy'])->name('cuti.destroy');
	Route::get('cuti/getdata/{id}', [CutiController::class, 'getdata']);
	
	Route::get('/sanksi', [SanksiController::class, 'index'])->name('sanksi');
	Route::get('/sanksicreate', [SanksiController::class, 'create'])->name('sanksicreate');
	Route::post('/sanksi', [SanksiController::class, 'store'])->name('sanksi.store');
	Route::get('/sanksiedit/{id}', [SanksiController::class, 'edit'])->name('sanksiedit');
	Route::put('/sanksi/update/{id}', [SanksiController::class, 'update'])->name('sanksi.update');
	Route::delete('/sanksi/{id}', [SanksiController::class, 'destroy'])->name('sanksi.destroy');

	Route::get('/reward', [RewardController::class, 'index'])->name('reward');
	Route::get('/rewardcreate', [RewardController::class, 'create'])->name('rewardcreate');
	Route::post('/reward', [RewardController::class, 'store'])->name('reward.store');
	Route::get('/rewardedit/{id}', [RewardController::class, 'edit'])->name('rewardedit');
	Route::put('/reward/update/{id}', [RewardController::class, 'update'])->name('reward.update');
	Route::delete('/reward/{id}', [RewardController::class, 'destroy'])->name('reward.destroy');

	Route::get('/phk', [PhkController::class, 'index'])->name('phk');
	Route::get('/phkcreate', [PhkController::class, 'create'])->name('phkcreate');
	Route::post('/phk', [PhkController::class, 'store'])->name('phk.store');
	Route::get('/phkedit/{id}', [PhkController::class, 'edit'])->name('phkedit');
	Route::put('/phk/update/{id}', [PhkController::class, 'update'])->name('phk.update');
	Route::delete('/phk/{id}', [PhkController::class, 'destroy'])->name('phk.destroy');

	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});