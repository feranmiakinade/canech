<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        if ($request->password === env('ADMIN_PASSWORD')) {
            $request->session()->put('admin_logged_in', true);

            return redirect()->route('admin.index');
        }

        return back()->withErrors([
            'password' => 'Incorrect password.',
        ]);
    }

    public function index(Request $request)
    {
        if (!$request->session()->get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $submissions = ContactSubmission::latest()->get();

        return view('admin.index', compact('submissions'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_logged_in');

        return redirect()->route('admin.login');
    }
}