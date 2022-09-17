<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPassEditRequest;
use App\Http\Requests\UserProfileEditRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function show()
    {
        $users = User::all();

        return view('admin.users_show', compact('users'));
    }
}
