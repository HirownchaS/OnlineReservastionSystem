<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Users\AdminController;
// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Service Page
Route::get('/services', [HomeController::class, 'services'])->name('services');



Route::get('/queries', [QueryController::class, 'index'])->name('queries.index');
Route::get('/queries/create', [QueryController::class, 'create'])->name('queries.create');
Route::post('/queries/store', [QueryController::class, 'store'])->name('queries.store');
// Route::get('/queries/{query}', [QueryController::class, 'show'])->name('queries.show');
Route::get('/queries/edit/{id}',[QueryController::class,'edit'])->name('queries.edit');
Route::put('/queries/update/{id}', [QueryController::class, 'update'])->name('queries.update');
Route::delete('/queries/destroy/{id}', [QueryController::class, 'destroy'])->name('queries.destroy');


Route::get('/reservation', [ReservationController::class, 'index'])->name('reservations.index');
Route::get('/reservation/create', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservation/store', [ReservationController::class, 'store'])->name('reservations.store');
// Route::get('/reservation/show/{id}', [ReservationController::class, 'show'])->name('reservations.show');
Route::get('/reservation/edit/{id}', [ReservationController::class, 'edit'])->name('reservations.edit');
Route::put('/reservation/update/{id}', [ReservationController::class, 'update'])->name('reservations.update');
Route::delete('/reservation/destory/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
// Route::get('/reservations/success', [ReservationController::class, 'success'])->name('reservations.success');
// Grouped under the auth middleware to ensure only logged-in users can access
Route::middleware(['auth'])->group(function () {
    Route::post('/reservations', [HomeController::class, 'submitReservation'])->name('reservations.submit');
Route::get('/reservations', [HomeController::class, 'reservations'])->name('reservation');
Route::get('/dashboard', [HomeController::class,'dashboard'])->name('dashboard');
Route::get('/log-out',[AuthenticatedSessionController, 'log_out'])->name('log-out');
});


// Contact Page
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');

// About Page
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Auth::routes();

// Redirect to dashboard based on role
// Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');

// // Admin, Staff, and Customer routes
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin.dashboard');
// });

// Route::middleware(['auth', 'role:staff'])->group(function () {
//     Route::get('/staff', [App\Http\Controllers\AdminController::class, 'staff'])->name('staff.dashboard');
// });

// Route::middleware(['auth', 'role:customer'])->group(function () {
//     Route::get('/', [App\Http\Controllers\AdminController::class, 'customer'])->name('customer.dashboard');
// });




// Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
