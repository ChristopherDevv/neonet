<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function store(Request $request)
    {
        $search = $request->input('searchname');

        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('username', 'LIKE', "%{$search}%")
            ->get();

        return redirect()->route('user.search')->with('users', $users);
    }
}
