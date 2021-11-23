<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function redirect(): RedirectResponse
    {
        if (auth()->user()->isAdmin) {
            return redirect()->route('admin.dashboard');
        }
        if (auth()->user()->isManager || auth()->user()->isUser) {
            return redirect()->route('cabinet');
        }
    }

    public function cabinet(): View
    {
        return view('cabinet');
    }
}
