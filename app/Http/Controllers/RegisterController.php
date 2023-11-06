<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        if(auth()->user()){
            return redirect()->route('post.index', auth()->user());
        }
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);
        $request->validate([
            "name" => 'required|min:3|max:15',
            "username" => 'required|min:3|max:15|unique:users,username',
            "email" => 'required|email|max:30|unique:users,email',
            "password" => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make( $request->password)
        ]);

        //autenticamos
        auth()->attempt($request->only('email', 'password'));
        
        return redirect()->route('post.index', auth()->user());
    }
}
