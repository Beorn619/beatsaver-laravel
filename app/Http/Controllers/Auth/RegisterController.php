<?php

namespace App\Http\Controllers\Auth;

use App\Mail\EmailVerification;
use App\Models\User;
use App\Models\VerifyUser;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     * Begins user registration process
     */
    public function register(Request $request)
    {
        // Check for duplicate username / email
        if (User::where('username', $request->get('username'))->exists()) {
            return redirect()->back()->withInput()->withErrors('Username already exists');

        } else if (User::where('username', $request->get('username'))->exists()) {
            return redirect()->back()->withInput()->withErrors('Email already exists');
        }

        $user = User::create([
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        VerifyUser::create([
            'user_id' => $user->id,
            'token' => str_random(40)
        ]);

        Mail::to($user->email)->send(new EmailVerification($user));

        return redirect()->route('view.login')->with(['message' => "Please check your email to verify your new account"]);
    }

    /**
     * Verifies a new user account
     */
    public function verify($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();

        if (isset($verify_user)) {
            $user = $verifyUser->user;

            // Set user to verified
            if (!$user->verified) {
                $user->update([
                    'is_verified' => true
                ]);

                $verifyUser->delete();

                return redirect()->route('view.login')->with(['message' => "Your e-mail was successfully verified"]);
            } else {
                return redirect()->route('view.login')->with(['message' => "Your e-mail was already verified"]);
            }
        } else {
            return redirect()->route('view.login')->withErrors("Sorry, your email cannot be identified");
        }
    }

    /**
     * Resend a verification token
     */
    public function resendVerify($token)
    {
        try {
            $verifyUser = VerifyUser::where('token', $token)->firstOrFail();

            Mail::to($verifyUser->user()->first()->email)->send(new EmailVerification($verifyUser->user()->first()));

            return redirect()->route('view.login')->with(['message' => "Please check your email for verification"]);

        } catch (ModelNotFoundException $e) {
            return redirect()->route('view.login')->withErrors("Unknown verification token");
        }
    }
}
