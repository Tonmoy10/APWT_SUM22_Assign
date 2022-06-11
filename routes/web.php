<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Registration', [userController::class, 'reg'])->name('Register');
Route::post('/Registration', [userController::class, 'regVal'])->name('Register.submit');
Route::get('/Login', [userController::class, 'log'])->name('Login');
Route::post('/Login', [userController::class, 'logVal'])->name('Login.submit');
Route::get('/Dashboard', [userController::class, 'dash'])->name('Dashboard');
Route::get('/AdminDashboard',[userController::class, 'adminDash'])->name('AdminDashboard');
Route::get('/User/Details/{Id}', [userController::class, 'info'])->name('Information');
Route::get('/Details',[userController::class, 'details'])->name('Details');
Route::get('/Homepage',[userController::class, 'home'])->name('Homepage');
Route::get('/PreReg',[userController::class, 'preReg'])->name('PreReg');
Route::post('/PreReg',[userController::class, 'preRegVal'])->name('PreReg.Next');
Route::get('/AdminReg',[userController::class, 'admin'])->name('Admin');
Route::post('/AdminReg',[userController::class, 'adminVal'])->name('Admin.submit');