<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Traits\MadeInternalLinks;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    use MadeInternalLinks;

    public function index(): View
    {
        $posts = Post::get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('admin.posts.new_edit');
    }

    public function store(PostRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $tags = Tag::get();
        $transformed = $this->transformNewPostTextToLinks($tags, $validated['text']);
        if ($transformed['status']) {
            $validated['text'] = $transformed['text'];
        }
        $post = Post::create($validated);
        return redirect()->route('admin.posts.edit', ['post' => $post])
            ->with('success', "Новину \"{$post->title}\" успішно створено. Добавте теги");
    }

    public function edit(Post $post): View
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
