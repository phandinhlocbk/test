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

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.user_master');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function show()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        return view('user.user_profile', compact('user'));
    }

    public function edit()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        return view('user.user_profile_edit', compact('user'));
    }

    public function update(UserProfileEditRequest $request)
    {
        DB::beginTransaction();
        $id = Auth::user()->id;
        $user = User::find($id);
        $validatedRequestData = $request->validated();
        try {
            if ($request->file('profile_image')) {
                $file = $request->file('profile_image');
                $filename = today() . $file->getClientOriginalName();
                $file->move(public_path('upload/user_images'), $filename);
                $validatedRequestData['profile_image'] = $filename;
            }
            $user->fill($validatedRequestData)->save();
        } catch (Exception $e) {
            DB::rollback();

            return $e;
        }
        DB::commit();

        return redirect()->route('user.profile');
    }

    public function changePassword()
    {
        return view('user.user_change_passwod');
    }

    public function updatePassword(UserPassEditRequest $request)
    {
        $validateData = $request->validated();
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::User()->id);
            $user->password = bcrypt($request->newpassword);
            $user->fill($validateData)->save();

            return redirect()->route('user.profile');
        } else {
            return redirect()->back();
        }
    }
}
