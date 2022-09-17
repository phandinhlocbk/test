<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPassEditRequest;
use App\Http\Requests\AdminProfileEditRequest;
use App\Models\User;
use App\Models\Admin;
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

    public function usersShow()
    {
        $users = User::all();

        return view('admin.users_show', compact('users'));
    }

    public function show()
    {
        $admin =  Auth::guard('admin')->user();

        return view('admin.admin_profile', compact('admin'));
    }

    public function edit()
    {
        $admin =  Auth::guard('admin')->user();

        return view('admin.admin_profile_edit', compact('admin'));
    }

    public function update(AdminProfileEditRequest $request)
    {
        DB::beginTransaction();
        $admin = Auth::guard('admin')->user();
        $validatedRequestData = $request->validated();
        try {
            if ($request->file('profile_image')) {
                $file = $request->file('profile_image');
                $filename = today() . $file->getClientOriginalName();
                $file->move(public_path('upload/user_images'), $filename);
                $validatedRequestData['profile_image'] = $filename;
            }
            $admin->fill($validatedRequestData)->save();
        } catch (Exception $e) {
            DB::rollback();

            return $e;
        }
        DB::commit();

        return redirect()->route('admin.profile');
    }

    public function changePassword()
    {
        return view('admin.admin_change_passwod');
    }

    public function updatePassword(AdminPassEditRequest $request)
    {
        $validateData = $request->validated();

        $hashedPassword = Auth::guard('admin')->user()->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = Auth::guard('admin')->user();
            $user->password = bcrypt($request->newpassword);
            $user->fill($validateData)->save();

            return redirect()->route('admin.profile');
        } else {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        User::find($id)->delete();

        return redirect()->route('admin.users');
    }
}
