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
        // return $request;
        $validated = $request->validate([
            'email' => 'required|email:dns|unique:users|max:255',
            'name' => 'required',
            'identity_code' => 'required',
            'instansi' => 'required',
            'auth' => 'required',
            'password' => 'required'
        ]);
        $validated['password'] = bcrypt($validated['password']);

        if($request->picture) {
            Storage::disk('public')->delete(auth()->user()->picture);
            $validated['picture'] = $request->file('picture')->store('picture');
        }

        User::create($validated);

        return redirect('/')->with('success', 'Registrasi berhasil, silahkan log in');
    }

    public function update_profile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'identity_code' => 'required',
            'instansi' => 'required',
        ]);

        if($request->picture) {
            if(auth()->user()->picture) {
                Storage::disk('public')->delete(auth()->user()->picture);
            }
            $validated['picture'] = $request->file('picture')->store('picture');
        }

        $request->session()->regenerate();

        User::find($request->id)->update($validated);

        return back()->with('success', 'Profile berhasil diperbarui');
    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            if(auth()->user()->auth === "pendidik"){
                return redirect()->intended('/pendidik');
            } else if(auth()->user()->auth === "pelajar") {
                return redirect()->intended('/pelajar');
            };
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

    public function profile()
    {
        $user = User::find(auth()->user()->id);
        
        return view('user.profile', [
            'user' => $user
        ]);
    }
}
