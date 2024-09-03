<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Users\AdminController;


// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// admin dashboard reservation Page
Route::get('/reservation', [ReservationController::class, 'index'])->name('reservations.index');
Route::get('/reservation/create', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservation/store', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/reservation/edit/{id}',[ReservationController::class,'edit'])->name('reservations.edit');
Route::put('/reservation/update/{id}', [ReservationController::class, 'update'])->name('reservations.update');
Route::delete('/reservation/destory/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

//dashboard menu page
Route::get('/menu', [MenuController::class, 'index'])->name('menus.index');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menus.create');
Route::post('/menu/store', [MenuController::class, 'store'])->name('menus.store');
Route::get('/menu/edit/{id}',[MenuController::class,'edit'])->name('menus.edit');
Route::put('/menu/update/{id}', [MenuController::class, 'update'])->name('menus.update');
Route::delete('/menu/destory/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');
//dashboard category page
Route::get('/category', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/category/destory/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// admin dashboard query Page
Route::get('/queries', [QueryController::class, 'index'])->name('queries.index');
Route::get('/queries/create', [QueryController::class, 'create'])->name('queries.create');
Route::post('/queries/store', [QueryController::class, 'store'])->name('queries.store');
// Route::get('/queries/{query}', [QueryController::class, 'show'])->name('queries.show');
Route::get('/queries/edit/{id}',[QueryController::class,'edit'])->name('queries.edit');
Route::put('/queries/update/{id}', [QueryController::class, 'update'])->name('queries.update');
Route::delete('/queries/destroy/{id}', [QueryController::class, 'destroy'])->name('queries.destroy');




// Grouped under the auth middleware to ensure only logged-in users can access
Route::middleware(['auth'])->group(function () {
    Route::post('/reservations', [HomeController::class, 'submitReservation'])->name('reservations.submit');
    Route::get('/reservations', [HomeController::class, 'reservations'])->name('reservation');
    Route::get('/log-out',[AuthenticatedSessionController::class, 'log_out'])->name('log-out');
    Route::get('/dashboard', [HomeController::class,'dashboard'])->name('dashboard');
});

//service page
Route::get('/services', [HomeController::class, 'services'])->name('services');


// Contact Page
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');

// About Page
Route::get('/about', [HomeController::class, 'about'])->name('about');
//menu page
Route::get('/menus', [HomeController::class,  'menus'])->name('menus');



//email notification
Route::get('/notifications/read/{id}', function ($id) {
    $notification = Auth::user()->notifications()->find($id);
    if ($notification) {
        $notification->markAsRead();
    }
    return redirect()->back();
})->name('notifications.read');



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
