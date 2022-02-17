<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function signin()
    {
        return view("auth.signin");
    }

    public function getLogin(Request $req)
    {
        $user = User::where(['email' => $req->email])->first();
        if (!$user || !Hash::check($req->password, $user->password)) {

            return view('auth.signin')->with('error', "Email or Password did not match");
        }
        else{
            $req->session()->put('user', $user);
            return redirect('/');
        }

    }


    public function logout(Request $request) {

        Session::forget('user');

        return redirect('/signin');
    }
}
