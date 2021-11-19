<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

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

    public function index(): View
    {
        return view('main');
    }

    public function cabinet(): View
    {
        return view('cabinet');
    }
}
