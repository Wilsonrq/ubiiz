<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function show() {
        if (Auth::check()) {
            return redirect("/dashboard");
        }
        return view("auth.login");
    }

    public function login(LoginRequest $request) {
     

        $credentials = $request->getCredentials();
        

        if (!Auth::attempt($credentials)) {
            return redirect()->to("login")->withErrors("Email/Username o Password incorrectos");
        }

        $user = Auth::user();
        return $this->authenticated($request, $user);
    }

    public function authenticated(Request $request, $user) {
        return redirect()->route("dashboard");
    }
}