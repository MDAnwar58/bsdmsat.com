<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LocalUserContact;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    function index()
    {
        $contactMessages = LocalUserContact::get();
        return view('pages.backend.contact_message.index', compact('contactMessages'));
    }
    function get()
    {
        return LocalUserContact::latest()->get();
    }
    function view($id)
    {
        $localUserContact = LocalUserContact::find($id);
        if($localUserContact->is_read == 0)
        {
            $localUserContact->is_read = 1;
            $localUserContact->save();
        }
        return view('pages.backend.contact_message.show', compact('localUserContact'));
    }
}
