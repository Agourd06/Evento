<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\organizerController;

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
    return view('login');
})->name('login');
Route::get('/client', function () {
    return view('client.client');
});

Route::get('/eventsAccept', function () {
    return view('admin.eventsAccept');
});
Route::get('/organizer', function () {
    return view('organizer.organizer');
});
Route::get('/registration', function () {
    return view('register');
});


Route::middleware(['auth', 'role:admin'])->group(function () {



    Route::get('/admin', [adminController::class, 'DashBoardAdmin']);
    Route::get('/managUsers', [adminController::class, 'managUsers']);
    Route::post('/archive', [adminController::class, 'ArchiveCategorie']);
    Route::post('/editData', [adminController::class, 'DashBoardAdmin']);
    Route::post('/Createcategory' , [adminController::class , 'createCategory']);
    Route::post('/updateCategorie' , [adminController::class , 'updateCategorie']);
    Route::post('/archiveUser' , [adminController::class , 'archiveUser']);
    

});
Route::middleware(['auth', 'role:organizer'])->group(function () {



    Route::post('/createEvent' , [organizerController::class , 'createEvent']);
    

});






Route::post('/register', [authController::class , 'store']);
Route::post('/login', [authController::class , 'login']);
Route::get('/logout', [authController::class , 'logout']);