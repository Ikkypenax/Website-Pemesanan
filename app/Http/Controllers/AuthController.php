<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function showUserForm()
    {
        return view('loginuser');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role;

            if ($role === 'superadmin') {
                return redirect()->route('dashboard.index');
            } elseif ($role === 'admin') {
                return redirect()->route('dashboard.index');
            } elseif ($role === 'user') {
                return redirect()->back()->withErrors('Maaf anda tidak memiliki akses');
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = \App\Models\User::where('email', $email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak terdaftar.']);
        }

        if (!Hash::check($password, $user->password)) {
            return back()->withErrors(['password' => 'Password tidak sesuai.']);
        }

        Auth::login($user);

        $role = $user->role;
        if ($role === 'superadmin') {
            return redirect()->back()->withErrors('Maaf Anda tidak memiliki akses');
        } elseif ($role === 'admin') {
            return redirect()->back()->withErrors('Maaf Anda tidak memiliki akses');
        } elseif ($role === 'user') {
            return redirect()->route('order.create');
        }
    }

    public function register(Request $request)
    {
        // Validasi data request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Buat user dengan role 'user'
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        // Redirect ke halaman order.create
        return redirect()->route('login.user');
    }






    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();

    //         return redirect('dashboard');
    //     }

    //     return back()->withErrors([
    //         'email' => 'Email atau password salah.',
    //     ])->withInput();
    // }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function logoutUser(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
