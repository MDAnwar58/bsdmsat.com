<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\UserRow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function registerPage()
    {
        return view('auth.register');
    }
    function registerRequest(Request $request)
    {
        $userCheck = User::where('email', $request->email)->first();
        if ($userCheck) {
            return response()->json([
                'status' => 'email_unique',
                'message' => 'আগে একটি অ্যাকাউন্ট তৈরি করা আছে এই ইমেইলে।'
            ]);
        } else {
            $userRows = UserRow::select('row')->get();
            if ($userRows->count() > 0) {
                # code...
                foreach ($userRows as $userRow) {
                    $Urow = $userRow->row;
                }

                $userCount = User::count();
                if ($Urow < $userCount) {
                    return response()->json([
                        'message' => 'ফেল !দয়া করে আপনি সুপার হুজুরের সাথে যোগাযোগ করুন।',
                    ], 200);
                } else {
                    $user = new User();
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = Hash::make($request->password);
                    $user->save();

                    return response()->json([
                        'status' => 'success',
                        'message' => 'আপনার অ্যাকাউন্টি তৈরি হয়েছে।',
                    ], 200);
                }
            } else {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();

                return response()->json([
                    'status' => 'success',
                    'message' => 'আপনার অ্যাকাউন্টি তৈরি হয়েছে।',
                ], 200);
            }
        }

    }
}