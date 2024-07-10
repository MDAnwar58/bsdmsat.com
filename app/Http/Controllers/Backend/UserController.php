<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRow;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $userRowCount = UserRow::count();
        return view('pages.backend.user.index', compact('userRowCount'));
    }
    function getUsersRow()
    {
        return UserRow::get();
    }
    function setUsersRow(Request $request)
    {  
        $id = $request->id;
        // $userRowCheck = UserRow::count();
        if ($id) {
            $userRow = UserRow::findOrFail($id);
            $userRow->row = $request->row;
            $userRow->update();

            return response()->json([
                'success' => "ইউজারের ".$userRow->row." সংখ্যা সেট হয়েছে।",
                'row' => $userRow,
            ], 200);
        }else{
            $userRow = new UserRow();
            $userRow->row = $request->row;
            $userRow->save();

            return response()->json([
                'success' => "ইউজারের ".$userRow->row." সংখ্যা সেট হয়েছে।",
                'row' => $userRow,
            ], 200);
        }

    }
    function getUsers(Request $request)
    {
        $id = $request->header('id');
        $users = User::all();
        return [
            $users,
            $id
        ];
    }
    function userPermission($id)
    {
        $user = User::findOrFail(intval($id));
        if ($user->status == "cancel") {
            $user->status = "permission";
            $user->save();
            return response()->json([
                'status' => 'permission',
                'successPermission' => 'User Access Permission'
            ], 200);
        }else{
            $user->status = "cancel";
            $user->save();
            return response()->json([
                'successCancel' => 'User Access Cancel'
            ], 200);
        }
    }
    function destroy($id)
    {
        $user = User::findOrFail(intval($id));
        $user->delete();

        return 'User Deleted';
    }
}