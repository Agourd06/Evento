<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\adminReservation;
use App\Http\Controllers\clientController;
use App\Http\Controllers\organizerController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\adminReservationController;
use App\Http\Controllers\organizerReservationController;

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
    Route::delete('/archiveUser/{id}/', [AdminController::class, 'archiveUser']); 
       Route::post('/AcceptEvents' , [adminReservationController::class , 'AcceptEvents']);
    Route::post('/DeclineEvents' , [adminReservationController::class , 'DeclineEvents']);
    Route::get('/eventsAccept' , [adminReservationController::class , 'CheckEvents']);
    

});
Route::middleware(['auth', 'role:organizer'])->group(function () {


    Route::post('/AcceptReservation/{reservation_id}/{event_id}' , [organizerReservationController::class , 'AcceptReservation']);
    Route::post('/DeclineReservation/{reservation_id}' , [organizerReservationController::class , 'DeclineReservation']);
    Route::post('/createEvent' , [organizerController::class , 'createEvent']);
    Route::post('/EditEvents' , [organizerController::class , 'organizerIndex']);
    Route::match(['get', 'post'], '/updateEvent/{event}' , [organizerController::class , 'updateEvent']);
    Route::match(['get', 'post'], '/DeleteEvents/{event}' , [organizerController::class , 'DeleteEvents']);
    Route::get('/organizer' , [organizerController::class , 'organizerIndex']);
    Route::get('/reservationAccept' , [organizerReservationController::class , 'CheckReservation']);
 


});

Route::middleware(['auth', 'role:client'])->group(function () {


    Route::get('/home', function () {
        return view('client.home');
    });
    
    
    
    Route::get('/client' , [clientController::class , 'clientIndex']);
    Route::post('/reserve/{id}' , [clientController::class , 'ReserveEvent']);
    Route::post('/ticket/{id}' , [clientController::class , 'ticket']);
    Route::get('/MyTickets' , [clientController::class , 'ticketsIndex']);
    

});





Route::post('/register', [authController::class , 'store'])->middleware(RedirectIfAuthenticated::class);
Route::post('/login', [authController::class , 'login'])->middleware(RedirectIfAuthenticated::class);
Route::get('/logout', [authController::class , 'logout']);