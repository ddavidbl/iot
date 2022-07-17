<?php

use App\Http\Controllers\ChartDataController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Middleware;
use Psy\Command\ShowCommand;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes();

// Route::get('/test');
// Route::get('/test/{id}', [HomepageController::class, 'test']);

// Public
Route::get('/', [HomeController::class, 'homepageview']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/home/detail/{id}', [HomeController::class, 'getID']);
Route::get('/home/device', [HomeController::class, 'device']);
Route::get('/public/devices', [HomeController::class, 'renderDevices'])->name('render');


// Chart and Ajax
Route::get('/get_all_data', [HomeController::class, 'AllData']);
Route::get('/updatechart/{id}', [ChartDataController::class, 'POSTDATA'])->name('UpdateChart');
Route::get('/latest', [HomeController::class, 'getLatestData'])->name('LatestData');
// Route::get('/deviceslist', [DeviceController::class, 'renderDevices']);


Route::middleware(['auth', 'admin'])->controller(AdminController::class)->prefix('admin')->group(function () {

    Route::get('/iot', 'admin');
    Route::get('/home', 'adminHome');
    Route::get('/detail/{id}', 'getID');
    Route::get('/latestdata', 'getLatestData')->name('adminlatestdata');
    //Device CRUD
    Route::get('/renderlist', 'renderDevices')->name('admindevicelist');
    Route::get('/device', 'deviceIndex');
    Route::post('/device/new/post', 'storeDevice');
    Route::get('/device/edit/{id}', 'editDevice');
    Route::patch('/device/update/{id}', 'updateDevice');
    Route::get('/device/delete/{id}', 'destroy');

    //User CRUD
    Route::get('/renderuser', 'renderUser')->name('adminuserlist');
    Route::get('/user', 'userIndex');
    Route::post('/user/new/post', 'storeUser');
    Route::get('/user/edit/{id}', 'editUser');
    Route::patch('/user/update/{id}', 'updateUser');
    Route::get('/user/delete/{id}', 'destroyUser');

    //Volume
    Route::get('/volume/edit/{id}', 'volumeValue');
    Route::patch('/volume/update/{id}', 'updateVolume');
});

Route::middleware(['auth', 'user'])->controller(UserController::class)->prefix('user')->group(function () {
    Route::get('/volume/edit/{id}', 'volumeValue');
    Route::get('/volume/update/{id}', 'updateVolume');
});
