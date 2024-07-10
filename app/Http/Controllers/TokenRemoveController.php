<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenRemoveController extends Controller
{
    function tokenRemove()
    {
        return response()->json([
            'message' => 'Unauthorized!'
        ])->cookie('token', "", -1);
    }
}
