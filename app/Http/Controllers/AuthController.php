<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Account;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function landingpage()
    {
        if (session()->has('admin_id')) {
            return redirect('/dashboard');
        } elseif (session()->has('user_id')) {
            return redirect('/home');
        }
        return view('landingpage');
    }

    public function register(){
        
        if (session()->has('admin_id')) {
            return redirect('/dashboard');
        } elseif (session()->has('user_id')) {
            return redirect('/home');
        }
        return view('register');
    }

    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'role' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_no' => 'nullable|string|max:20',
            'username' => 'required|string|max:255|unique:users',
            'address' => 'nullable|string|max:255',
            'other_info_address' => 'nullable|string|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = Account::create($validatedData);

        return redirect('/account/login')->with('success', 'User created successfully!');
    }

    public function loginauth() {

        if (session()->has('admin_id')) {
            return redirect('/dashboard');
        } elseif (session()->has('user_id')) {
            return redirect('/home');
        } else {
            return view('login');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if ($user->role == 'Admin') {
                session(['admin_id' => $user->id]); 
                return redirect('/dashboard');
            } elseif ($user->role == 'User') {
                session(['user_id' => $user->id]); 
                return redirect('/home');
            } elseif ($user->role == 'Superadmin') {
                session(['superadmin_id' => $user->id]); 
                return redirect('/dashboard');
            } elseif ($user->role == 'IT') {
                session(['it_id' => $user->id]); 
                return redirect('/dashboard');
            }
        } else {
            $user = Account::where('email', $request->email)->first();
            
            if (!$user) {
                return redirect('/account/login')
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => 'No email found']);
            } else {
                return redirect('/account/login')
                    ->withInput($request->only('email'))
                    ->withErrors(['password' => 'Wrong password']);
            }
        }
    }
    


    public function logout()
    {
        Auth::logout(); 
        session()->flush();

        return redirect('/'); 
    }


   

}
