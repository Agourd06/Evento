<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\adminReservation;
use App\Http\Controllers\clientController;
use App\Http\Controllers\organizerController;
use App\Http\Controllers\adminReservationController;
use App\Http\Middleware\RedirectIfAuthenticated;

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
})->name('login')->middleware(RedirectIfAuthenticated::class);


// Route::get('/eventsAccept', function () {
//     return view('admin.eventsAccept');
// });

Route::get('/registration', function () {
    return view('register');
})->middleware(RedirectIfAuthenticated::class);


Route::middleware(['auth', 'role:admin'])->group(function () {



    Route::get('/admin', [adminController::class, 'DashBoardAdmin']);
    Route::get('/managUsers', [adminController::class, 'managUsers']);
    Route::post('/archive', [adminController::class, 'ArchiveCategorie']);
    Route::post('/editData', [adminController::class, 'DashBoardAdmin']);
    Route::post('/Createcategory' , [adminController::class , 'createCategory']);
    Route::post('/updateCategorie' , [adminController::class , 'updateCategorie']);
    Route::post('/archiveUser' , [adminController::class , 'archiveUser']);
    Route::post('/AcceptEvents' , [adminReservationController::class , 'AcceptEvents']);
    Route::post('/DeclineEvents' , [adminReservationController::class , 'DeclineEvents']);
    Route::get('/eventsAccept' , [adminReservationController::class , 'CheckEvents']);
    

});
Route::middleware(['auth', 'role:organizer'])->group(function () {



    Route::post('/createEvent' , [organizerController::class , 'createEvent']);
    Route::get('/organizer' , [organizerController::class , 'organizerIndex']);
    

});

Route::middleware(['auth', 'role:client'])->group(function () {


    Route::get('/home', function () {
        return view('client.home');
    });
    
    Route::get('/client' , [clientController::class , 'clientIndex']);
    Route::post('/reserve/{id}' , [clientController::class , 'ReserveEvent']);
    

});

// Route::get('/errorPage', function () {
//     return view('errorPage');
// });




Route::post('/register', [authController::class , 'store'])->middleware(RedirectIfAuthenticated::class);
Route::post('/login', [authController::class , 'login'])->middleware(RedirectIfAuthenticated::class);
Route::get('/logout', [authController::class , 'logout']);