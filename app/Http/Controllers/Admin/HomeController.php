<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $usersCount = User::count();
        $postsCount = Post::count();
        return view('admin.home', compact('usersCount', 'postsCount'));
    }
}
