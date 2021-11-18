<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{

    public function index(): Application|Factory|View
    {
        $posts = Post::get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create(): Application|Factory|View
    {
        return view('admin.posts.new_edit');
    }

    public function store(PostRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $post = Post::create($validated);
        return redirect()->route('admin.posts.edit', ['post' => $post])
            ->with('success', "Новину \"{$request->title}\" успішно створено. Добавте теги");
    }

    public function edit(Post $post): Application|Factory|View
    {
        return view('admin.posts.new_edit', compact('post'));
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:191', 'unique:posts,title,' . $post->id],
            'text' => ['nullable', 'string'],
        ]);
        $post->update($validated);
        return redirect()->route('admin.posts.index')
            ->with('success', "Новину \"{$post->title}\" успішно оновлено");
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('admin.posts.index')
            ->with('success', "Новину \"{$post->title}\" успішно видалено");
    }
}
