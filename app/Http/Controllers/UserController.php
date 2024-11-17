<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->status && Auth::user()->status->user_status_name === 'user') {
            return redirect()->route('dashboard'); // เปลี่ยนไปที่ dashboard สำหรับ user
        } else {
            return view('admin-dashboard'); // เปลี่ยนไปที่ admin-dashboard สำหรับ admin
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.login');
    }
}
