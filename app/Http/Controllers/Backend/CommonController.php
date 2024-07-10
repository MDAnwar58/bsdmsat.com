<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterUsefulLink;
use App\Models\LocalUserContact;
use App\Models\User;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    function getUser(Request $request)
    {
        $email = $request->header('email');
        return User::where('email', $email)->first();
    }
    // function getLocalUserMessage()
    // {
    //     return LocalUserContact::where('is_read', 0)->get();
    // }
    function getLocalUserMessageCount()
    {
        return LocalUserContact::where('is_read', 0)->count();
    }
}
