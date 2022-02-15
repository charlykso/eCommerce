<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function Register()
    {
        return view('auth.register');
    }

    public function getRegistered(Request $request)
    {
        //validat request details
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => ['required', 'confirmed', Password::min(6)]
        ]);
        // dd($request->input());
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('name'));
        $user->save();

        return redirect('/signin')->with('success', 'Registeration successfull');
    }
}
