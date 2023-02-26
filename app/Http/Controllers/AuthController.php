<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginIndex(){
        $data['title'] = "Login";
        return view('Admin.Login', $data);
    }

    public function Authenticate(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('officer')->attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('Dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');

    }

    public function loginUser(Request $request){
        // dd($request->all());
        $mes = [
            "email.required" => "Email harus di isi",
            // "email.email"    => "Email harus berisi email",
            "email.unique"   => "Email sudah digunakan",
            "password.required" => "Kata sandi harus di isi"
        ];

        $val = $request->validate([
            'email' => "required",
            'password' => "required"
        ], $mes);
        // dd($request->only('username', 'password'));
        $username = $request->email;
        if (Auth::attempt($val) xor Auth::attempt(['username' => $username, "password" =>$request->password])) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->with('error', "Akun tidak ditemukan");
    }

    public function UserIndex(){
        $data['title'] = "Legit";
        $data['page_title'] = "Login / Masuk";
        return view('Clients.LoginIndex', $data);
    }
    public function registerIndex(){
        $data['title'] = "Legit";
        $data['page_title'] = "Register / Daftar";
        return view('Clients.Register', $data);
    }

    public function register(Request $request){
        // dd($request->all());

        $cusMessage = [
            "email.required" => "Email harus di isi",
            "email.email"    => "Email harus berisi email",
            "email.unique"   => "Email sudah digunakan",
            "password.required"       => "Password harus di isi",
            "password.confirmed" => "Password tidak sama dengan konfirmasi password",
            "name.required" => "Nama harus di isi",
            "username.required" => "Username harus di isi",
            "username.unique" => "Username sudah digunakan",
            "phone_number.required" => "Nomor HP harus di isi",
            "phone_number.max" => "Maksimal nomor HP 14 angka",
            "phone_number.min" => "Minimal nomor HP 12 angka",
            "phone_number.unique" => "Nomor HP sudah digunakan",
        ];

        $request->validate([
            'email' => "email|required|unique:users",
            'username' => "required|unique:users",
            'password' => "required|confirmed",
            'phone_number' => "required|unique:users|max:14|min:12",
            'name'  => "required"
        ], $cusMessage);

        User::create([
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "name"  => $request->name,
            "username" => $request->username,
            "phone_number" => $request->phone_number
        ]);

        return redirect()->route('loginIndex')->with('success', "Berhasil melakukan registrasi");
    }

    public function userLogout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
