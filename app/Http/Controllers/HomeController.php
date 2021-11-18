<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
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

    public function index(): Application|Factory|View
    {
        return view('main');
    }

    public function cabinet(): Application|Factory|View
    {
        return view('cabinet');
    }
}
