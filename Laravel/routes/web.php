<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Superadmin\RolesController;
use App\Http\Controllers\Superadmin\UsersController;


Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    // Roles Functions
    Route::resource('roles', RolesController::class);
    // Permissions Functions
    // Users Functions
    Route::group(['prefix' => 'users'], function () {
        Route::get('/',  [UsersController::class, 'index'])->name('users.index');
        Route::get('/create', [UsersController::class, 'create'])->name('users.create');
        Route::post('/create', [UsersController::class, 'store'])->name('users.store');
        Route::get('/{user}/show', [UsersController::class, 'show'])->name('users.show');
        Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
        Route::patch('/{user}/update', [UsersController::class, 'update'])->name('users.update');
        Route::delete('/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy');
    });

});

// For testing only
Route::middleware('debug')->group(function () {
    Route::get('/login/{username}', function ($username) {
        $user = User::where('username', $username)->first();
        Auth::login($user);
        return redirect('/dashboard');
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/uploade', [UploadeController::class, 'index'])->name('uploade');
Route::get('/result', [UploadeController::class, 'result'])->name('result');