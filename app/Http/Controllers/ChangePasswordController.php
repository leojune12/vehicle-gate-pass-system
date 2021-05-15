<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('auth/update-password');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'current_password' => 'required|password',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->forceFill([
            'password' => Hash::make($request['password']),
        ])->save();

        return redirect('/dashboard');
    }
}
