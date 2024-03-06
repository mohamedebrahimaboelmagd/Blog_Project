<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => 'required|string',
            "email" => 'required|email|unique:contacts,email',
            "subject" => 'required|string',
            "message" => 'required|string',
        ]);

        Contact::create($data);

        return redirect()->back()->with('status', 'your message sent successfully');
    }
}
