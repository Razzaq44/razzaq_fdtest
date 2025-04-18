<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Logout;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\BookController;
use App\Livewire\Books;
use App\Livewire\Guest;
use App\Livewire\HomePage;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\ChangePassword;

//Guest Routes
Route::get('/', Guest::class)->name('guest');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/logout', Logout::class)->name('logout');
    Route::get('/forgot-password', ForgotPassword::class)->name('forgot.password');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
});
Route::get('/change-password', ChangePassword::class)->middleware('auth')->name('change.password');

Route::middleware('auth')->group(function () { 
    // Book Routes
    Route::get('/books', Books::class)->name('books');
    Route::post('/book-store', [BookController::class, 'store'])->name('book.store');
    Route::put('/book-update/{book}', [BookController::class, 'update'])->name('book.update');
    // HomePage Routes
    Route::get('/home', HomePage::class)->name('home');
});

// Email Verify Auth
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');