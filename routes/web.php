<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.login');
});

// ใช้ middleware auth กับ route ที่ต้องการ
Route::middleware(['auth','banned'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/admin-dashboard', [UserController::class, 'index'])->name('admin-dashboard');

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
        // dd($data);
    })->name('personal');

    Route::get('/add-personal', function () {
        return view('project.addpersonnel');
    })->name('addpersonal');

    Route::get('/system-setting', function () {
        return view('system-setting');
    })->name('system-setting');

    Route::get('/profile-view/{id}', function ($id) { //ดูข้อมูลโปรไฟล์
        // dd($id);
        return view('project.view', compact('id'));
    })->name('profile-view');

    Route::get('/profile-edit/{id}', function ($id) { //แก้ไขข้อมูลโปรไฟล์
        // dd($id);
        return view('project.edit', compact('id'));
    })->name('profile-edit');

    Route::get('/task-edit/{id}', function ($id) {
        // dd($id);
        return view('project.edittask', compact('id'));
    })->name('task-edit');

    Route::get('user/status/{user_id}/{account_status_id}', [UserController::class, 'updateStatus'])->name('user.status');
});

Route::get('/home', [UserController::class, 'index']);
