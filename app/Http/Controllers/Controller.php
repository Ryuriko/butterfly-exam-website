<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function index()
    {
        return view('index');
    }
    public function registration()
    {
        return view('userRegistration.registration');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:dns|unique:users|max:255',
            'name' => 'required',
            'instansi' => 'required',
            'password' => 'required',
        ]);
        $validated['password'] = bcrypt($validated['password']);

        // $user = [
        //     'name' => $request->nama,
        //     'email' => $request->email,
        //     'instansi' => $request->instansi,
        //     'password' => bcrypt($request->password)
        // ];

        User::create($validated);
        Storage::makeDirectory('public/' . $validated['name']);

        $request->session()->flash('success', 'Registration successfully! Please Log in');

        return view('index')->with('success', 'registration');
    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->intended('/pendidik');
        };

        return back()->with('loginError', 'Login Failed!');        
    }
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
