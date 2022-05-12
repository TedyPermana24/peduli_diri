<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');    
    }

    public function registration(){
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $request->validate([
            'nik' => 'required|unique:users,email',
            'name' => 'required'
        ],[

            'nik.required' => 'NIK tidak boleh kosong',
            'nik.unique' => 'NIK sudah terdaftar',
            'name.required' => 'Nama tidak boleh kosong'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->nik,
            'password' => bcrypt($request->nik)
        ];

        User::create($data);

        return redirect('/register')->with('success', 'Data berhasil didaftarkan');
    }

    public function login() 
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        
        if(Auth::attempt(['name'=>$request->name, 'email'=>$request->email, 'password'=>$request->email])){          
            return redirect('/dashboard');
        }
        return redirect('/')->withFail('NIK atau Nama yang anda masukkan salah !');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
