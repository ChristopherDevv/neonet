<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index()
    {
       if(auth()->user()){
            return redirect()->route('post.index', auth()->user());
        }
        return view('auth.login');
    }


    public function store(Request $request)
    {
       request()->validate([
        'email' => 'required|email',
        'password' => 'required'
       ]);

       if(!auth()->attempt($request->only('email', 'password'), $request->remember))
       {
        return back()->with('massageInvalided', 'Invalided credentials, try again');
       }

       return redirect()->route('post.index', auth()->user());
    }

    /**
     * Display the specified resource.
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Login $login)
    {
        //
    }
}
