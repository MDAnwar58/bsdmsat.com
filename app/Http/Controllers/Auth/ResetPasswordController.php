<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    function resetPasswordPage()
    {
        return view('auth.reset-password');
    }
    function resetPasswordRequest(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user) {
            $user->password = Hash::make($request->newPassword);
            $user->save();

            return response()->json([
                'status' => 'success',
                'message' => 'আপনার পাসওয়ার্ডটি পরিবর্তন হয়েছে।'
            ], 200);
        } else {
            return response()->json([
                'status' => 'errorEmail',
                'message' => 'ইমেইলটি খুঁজে পাওয়া যায় নি।'
            ], 200);
        }
    }
}
