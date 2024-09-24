<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Usercontroller extends Controller
{
    public function register_view()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|string|confirmed'
        ]);
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        }
        return redirect()->route('register')->withError('Error');
    }
    public function login_view()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([

            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        }
        return redirect()->route('login')->withError('Credentials mismatched!');
    }
    public function dashboard()
    {
        $userId = auth()->user()->id;
        $tasks = Task::all()->where('user_id', $userId)->toArray();
        return view('dashboard', ['tasks' => $tasks]);
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
