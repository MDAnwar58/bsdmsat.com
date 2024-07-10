<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendMailForForgetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{
    function forgetPasswordPage()
    {
        return view('auth.forget-password');
    }
    function sendEmail(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user) {
            Mail::to($user->email)->send(new SendMailForForgetPassword($user));

            return response()->json([
                'status' => 'success',
                'message' => 'Email sent',
                'email' => $user->email
            ], 200);
        }else{
            return response()->json([
                'status' => 'fail',
                'message' => 'Email not found!please create a account'
            ], 200);
        }
    }
}
