<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::get('/admin-dashboard', function () {
    //     return view('admin-dashboard');
    // })->name('admin.dashboard'); // ตั้งชื่อให้เป็น admin.dashboard

    Route::get('/admin-dashboard', [UserController::class, 'index'])->name('admin-dashboard');
    Route::get('/add-work', function () {
        return view('add');
    });

    Route::get('/add-task', function () {
        return view('project.add');
    })->name('add-task');


    Route::get('/project', function () {
        return view('projects');
    })->name('projects');

    Route::get('/account-setting', function () {
        return view('account_setting');
    })->name('account_setting');

    Route::get('/personal', function () {
        return view('personal');
    })->name('personal');

    Route::get('/add-personal', function () {
        return view('project.addpersonnel');
    })->name('addpersonal');

    Route::get('/system-setting', function () {
        return view('system-setting');
    })->name('system-setting');
});

// Route::DELETE('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/home', [UserController::class, 'index']);
