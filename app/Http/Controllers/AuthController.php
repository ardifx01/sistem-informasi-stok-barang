<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Redirect sesuai role
            // ...
            $role = Auth::user()->role;
            return match ($role) {
                'Admin' => to_route('staff.admin.dashboard'),
                'Pengelola Barang' => to_route('staff.pb.dashboard'),
                'Penanggung Jawab' => to_route(route: 'staff.pj.dashboard'),
                default => to_route('login')->withErrors(['username' => 'Role tidak dikenali.'])
            };
        }

        return back()
            ->withErrors(['username' => 'Username atau password salah.'])
            ->onlyInput('username');
    }

    /**
     * Logout user and regenerate session token
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    /*******  4132569d-a512-49db-a9d5-cf3dd868b83b  *******/
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('login');
    }
}
