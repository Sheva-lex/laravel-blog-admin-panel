<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Traits\MadeInternalLinks;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{
    use MadeInternalLinks;

    public function index(): View
    {
        $posts = Post::with('tags')->get();
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
        $newPost = Post::create($validated);
        if ($postTags = $validated['tags']) {
            foreach ($postTags as $tag) {
                $newPost->tags()->create([
                    'name' => $tag,
                ]);
                $posts = Post::get();
                foreach ($posts as $post) {
                    if ($newPost->id != $post->id) {
                        $transformed = $this->transformToLink($tag, $post->text, $newPost->id);
                        if ($transformed['count']) {
                            $post->update(['text' => $transformed['text']]);
                        }
                    }
                }
            }
        }
        return redirect()->route('admin.posts.index')
            ->with('success', "Новину \"{$newPost->title}\" успішно створено.");
    }

    public function edit(Post $post): View
    {
        return view('admin.posts.new_edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $validated = $request->validated();
        $tags = Tag::get();
        $transformed = $this->transformExistingPostTextToLinks($tags, $validated['text'], $post->id);
        if ($transformed['status']) {
            $validated['text'] = $transformed['text'];
        }
        $post->update($validated);
        if ($newPostTags = $validated['tags']) {
            foreach ($newPostTags as $tag) {
                $post->tags()->create([
                    'name' => $tag,
                ]);
                $posts = Post::get();
                foreach ($posts as $p) {
                    if ($post->id != $p->id) {
                        $transformed = $this->transformToLink($tag, $p->text, $post->id);
                        if ($transformed['count']) {
                            $p->update(['text' => $transformed['text']]);
                        }
                    }
                }
            }
        }
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
