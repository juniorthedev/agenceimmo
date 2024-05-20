<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function create() {
        return view('auth.register');
    }

    public function store(RegisterRequest  $request) {
        $user = User::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            return redirect()->route('login');
        }
        else {
            return redirect()->back();
        }


    }

    public function login() {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request) {
        $infos = $request->validated();

        if(Auth::attempt($infos)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.property.index'));
        }
        else {
            return redirect()->back()->withErrors([
                    'email' => 'Identifiants incorrects'
                    ])->onlyInput('email');
        }
    }

    public function dashboard() {
        return view('dashboard');
    }

    public function logout() {
        Auth::logout();
        return to_route('login')->with('success', 'Vous etes maintenant déconnecté !');
    }
}
