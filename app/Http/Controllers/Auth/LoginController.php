<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Attempt login with provide credentials
     */
    public function login(LoginRequest $request)
    {
        try {
            $user = User::where('email', $request->get('email'))->firstOrFail();

            // Check if account is verified
            if (!$user->is_verified) {
                $token = $user->verifyUser()->first()->token;

                return redirect()->route('view.login')->with('token', $token)->withErrors('Please verify your email before logging in.');
            }

            // Check users password
            if ($user && Hash::check($request->get('password'), $user->password)) {
                Auth::login($user, (boolean)$request->get('remember_me'));

                return redirect()->route('view.newest');
            }

            return redirect()->back()->withInput()->withErrors('Incorrect username or password');

        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withInput()->withErrors('Incorrect username or password');
        }
    }

    /**
     * Logout authenticated user
     */
    public function logout()
    {
        Auth::logout();
        session()->flush();

        return redirect()->route('view.newest');
    }
}
