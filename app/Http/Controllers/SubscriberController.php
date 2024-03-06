<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            "email" => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create($data);

        return redirect()->back()->with('status', 'subscribe send successfully');
    }
    public function storeFooter(Request $request)
    {
        $dataFooter = $request->validate(
            [
                "emailfooter" => 'required|email|unique:subscribers,email',
            ],
            [
                'emailfooter.required' => 'email is required',
                'emailfooter.email' => 'invalid email',
                'emailfooter.unique' => 'email already exits in system',
            ]
        );

        Subscriber::create([
            'email' => $dataFooter['emailfooter'],
        ]);

        return redirect()->back()->with('statusFooter', 'subscribe send successfully');
    }
}
