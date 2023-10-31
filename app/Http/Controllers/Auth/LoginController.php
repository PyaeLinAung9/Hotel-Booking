<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\login\checkValidation;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function loginPage() {
        return view('auth.login');
    }
    public function login(checkValidation $request) {
        $validation     = Auth::guard('Admin')->attempt([
            'name'      => $request->get('username'),
            'password'  => $request->get('password')
        ]);
        if($validation) {
            return redirect()->route('index');
        }else{
            return redirect()->route('loginPage')->with('loginError', 'User name or password is incorected!')->withInput();
        }
    }
    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect()->route('loginPage');
    }
}
