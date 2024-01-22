<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;

Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');

    // Updated routes with auth middleware
    Route::get('incomes', [IncomeController::class,'index'])->name('incomes');
    Route::post('incomes', [IncomeController::class,'add'])->name('addIncome');
    Route::put('incomes/{id}', [IncomeController::class,'update'])->name('editIncome');
    Route::delete('incomes/{id}', [IncomeController::class,'delete'])->name('deleteIncome');

    Route::post('expenses', [ExpenseController::class,'add'])->name('addExpense');
    Route::get('expenses', [ExpenseController::class,'index'])->name('expenses');
    Route::put('expenses/{id}', [ExpenseController::class,'update'])->name('editExpense');
    Route::delete('expenses/{id}', [ExpenseController::class,'delete'])->name('deleteExpense');

    Route::get('', [DashboardController::class,'index']);

    Route::get('profile', [UserController::class,'profile'])->name('profile');
    Route::post('profile/{user}', [UserController::class,'updateProfile'])->name('profile.update');
    Route::put('profile/update-password/{user}', [UserController::class,'updatePassword'])->name('update-password');
    Route::post('logout', [LogoutController::class,'index'])->name('logout');

    Route::resource('users', UserController::class);
});

Route::middleware(['guest'])->prefix('admin')->group(function () {
    Route::get('', [DashboardController::class,'index']);

    Route::get('login', [LoginController::class,'index'])->name('login');
    Route::post('login', [LoginController::class,'login']);

    Route::get('register', [RegisterController::class,'index'])->name('register');
    Route::post('register', [RegisterController::class,'store']);

    Route::get('forgot-password', [ForgotPasswordController::class,'index'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class,'requestEmail']);
    Route::get('reset-password/{token}', [ResetPasswordController::class,'index'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class,'resetPassword'])->name('password.update');
});

Route::get('/', function () {
    return view('welcome');
});
