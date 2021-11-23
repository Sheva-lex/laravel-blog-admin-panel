<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::get();
        return view('main', compact('posts'));
    }

    public function show(Post $post): View
    {
        return view('posts.show', compact('post'));
    }
}
