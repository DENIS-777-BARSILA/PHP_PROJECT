<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\RideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CarController as UserCarController;
use App\Http\Controllers\RideController as UserRideController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;



Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', function () {return view('welcome');});

Route::get('/rides', [UserRideController::class, 'index'])->name('rides.index');
Route::get('/rides/{id}', [UserRideController::class, 'show'])->name('rides.show');


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/cars', [CarController::class, 'index'])->name('admin.cars.index');
    Route::get('/cars/create', [CarController::class, 'create'])->name('admin.cars.create');
    Route::post('/cars', [CarController::class, 'save'])->name('admin.cars.store');
    Route::get('/cars/{id}', [CarController::class, 'show'])->name('admin.cars.show');
    Route::get('/cars/{id}/edit', [CarController::class, 'edit'])->name('admin.cars.edit');
    Route::put('/cars/{id}', [CarController::class, 'update'])->name('admin.cars.update');
    Route::delete('/cars/{id}', [CarController::class, 'destroy'])->name('admin.cars.destroy');

    Route::get('/rides', [RideController::class, 'index'])->name('admin.rides.index');
    Route::post('/rides', [RideController::class, 'save'])->name('admin.rides.store');
    Route::get('/rides/{id}', [RideController::class, 'show'])->name('admin.rides.show');
    Route::get('/rides/{id}/edit', [RideController::class, 'edit'])->name('admin.rides.edit');
    Route::put('/rides/{id}', [RideController::class, 'update'])->name('admin.rides.update');
    Route::delete('/rides/{id}', [RideController::class, 'destroy'])->name('admin.rides.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('/my-cars', [UserCarController::class, 'myCars'])->name('my-cars.index');
    Route::get('/my-cars/create', [UserCarController::class, 'create'])->name('my-cars.create');
    Route::post('/my-cars', [UserCarController::class, 'save'])->name('my-cars.store');
    Route::get('/my-cars/{id}', [UserCarController::class, 'show'])->name('my-cars.show');
    Route::get('/my-cars/{id}/edit', [UserCarController::class, 'edit'])->name('my-cars.edit');
    Route::put('/my-cars/{id}', [UserCarController::class, 'update'])->name('my-cars.update');
    Route::delete('/my-cars/{id}', [UserCarController::class, 'destroy'])->name('my-cars.destroy');
    
    Route::get('/my-rides', [UserRideController::class, 'myRides'])->name('my-rides.index');
    Route::post('/rides', [UserRideController::class, 'save'])->name('rides.store');
    Route::get('/rides/{id}/edit', [UserRideController::class, 'edit'])->name('rides.edit');
    Route::put('/rides/{id}', [UserRideController::class, 'update'])->name('rides.update');
    Route::delete('/rides/{id}', [UserRideController::class, 'destroy'])->name('rides.destroy');
    Route::get('/my-rides/{id}', [UserRideController::class, 'showMyRide'])->name('my-rides.show');

    Route::get('/create-ride', [App\Http\Controllers\RideController::class, 'create'])->name('create.ride');

    
    Route::post('/rides/{id}/book', [BookingController::class, 'save'])->name('bookings.store');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::get('/my-bookings', [BookingController::class, 'index'])->name('my-bookings.index');
    Route::get('/my-bookings/{id}', [BookingController::class, 'show'])->name('my-bookings.show');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
});
