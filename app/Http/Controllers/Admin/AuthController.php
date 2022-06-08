<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function auth()
    {
        return view('admin.auth.index');
    }

    public function process(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $remember_me = (!empty($request->remember_me)) ? true : false;

        if (Auth::attempt([
            'username' => $username,
            'password' => $password,
        ])) {
            $user = User::where('username', $username)->first();

            Auth::login($user, $remember_me);

            // update 
            User::where('username', $username)
                ->update(['last_login' => date('Y-m-d H:i:s')]);
            // end

            return redirect()->intended('dashboard');
        } else {
            return redirect('auth/login')->with(['error' => 'Username atau Password Salah!']);
        }
    }

    public function logout()
    {
        // update
        User::where('id', Auth::id())->update(['last_logout' => date('Y-m-d H:i:s')]);
        Auth::logout();

        return redirect('auth/login');
        // end
    }
}
