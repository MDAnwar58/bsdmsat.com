<?php

namespace App\Http\Controllers\Auth;

use App\Helper\JWTToken;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function loginPage()
    {
        return view('auth.login');
    }
    function loginRequest(LoginRequest $request)
    {
        $checkUser = User::where('email', $request->email)->first();
        if ($checkUser) {
            if (password_verify($request->password, $checkUser->password)) {
                $email = $request->input('email');
                $userId = $checkUser->id;
                $token = JWTToken::createToken($email, $userId);

                return response()->json([
                    'status' => 'success',
                    'message' => 'User Login!',
                    'user' => $checkUser
                ], 200)->cookie('token', $token);
            } else {
                return response()->json([
                    'status' => 'passwordError',
                    'message' => 'দয়া করে ভেলিড পাসওয়ার্ড প্রদান করুন।',
                ], 200);
            }
        } else {
            return response()->json([
                'status' => 'emailError',
                'message' => 'দয়া করে ভেলিড ইমেইল প্রদান করুন।',
            ], 200);
        }
    }
    function logout()
    {
        return redirect()->route('login.page')->cookie('token', '', -1);
    }
}