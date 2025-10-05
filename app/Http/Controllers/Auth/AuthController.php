<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    /**
     * Handle the login request.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Logic for handling login
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials, $request->boolean('remember'))) {
            // Authentication passed
            if($request->axios){
                Cookie::queue(
                    'user_session',
                    auth()->user()->id,
                    525600
                );
                return response()->json([
                    'code' => 'REGISTRATION_SUCCESS',
                    'message' => 'Registration successful',
                    'user' => auth()->user()
                ]);
            }
            $request->session()->regenerate();
            return redirect()->route('auth.dashboard')->with('success', 'Login successful!');
        }
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    /**
     * Handle the registration request.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // Logic for handling registration
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        try {
            $users = User::count();
            // Create the user
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'role' => $users > 0 ? 'user' : 'admin'
            ]);

            // Log the user in
            auth()->login($user);

            if($request->axios){
                Cookie::queue(
                    'user_session',
                    auth()->user()->id,
                    525600
                );
                return response()->json([
                    'code' => 'REGISTRATION_SUCCESS',
                    'message' => 'Registration successful',
                    'user' => $user
                ]);
            }

            return redirect()->route('auth.dashboard')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Registration failed. Please try again.']);
        }
    }

    /**
     * Handle the password reset request.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function resetPassword(Request $request)
    {
        // Logic for handling password reset
    }

    /**
     * check user email existing or not
     */
    public function emailCheck(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        $check = User::where('email',$request->email)->first();
        if($check){
            return response()->json([
                'code' => 'EMAIL_EXISTS',
                'message' => 'Nice, Match found'
            ]);
        }else{
            return response()->json([
                'code' => 'EMAIL_NOT_EXISTS',
                'message' => 'Go ahead for next!'
            ]);
        }
    }

    // auth logout
    public function logout(){
        if(auth()->user()){
            auth()->logout();
        }
        return redirect(route('auth.login'));
    }
}
