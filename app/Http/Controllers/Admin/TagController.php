<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Traits\MadeInternalLinks;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    use MadeInternalLinks;

    public function store(TagRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $tag = Tag::create($validated);
        $posts = Post::get();
        foreach ($posts as $post) {
            $transformed = $this->transformToLink($tag->name, $post->text, $tag->post->id);
            if ($transformed['status'] === 1) {
                Post::where('id', $post->id)->update(['text' => $transformed['text']]);
            }
        }
        return redirect()->back()
            ->with('success', "Тег \"{$validated['name']}\" успішно створено");
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tagName = $tag->name;
        $posts = Post::get();
        foreach ($posts as $post) {
            $transformed = $this->removeLink($tagName, $post->text, $tag->post->id);
            if ($transformed['status']) {
                Post::where('id', $post->id)->update(['text' => $transformed['text']]);
            }
        }
        $tag->delete();
        return redirect()->back()
            ->with('success', "Тег \"{$tagName}\" успішно видалено");
    }
}
