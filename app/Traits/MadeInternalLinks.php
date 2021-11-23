<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;

trait MadeInternalLinks
{
    public function removeLink(string $tag, ?string $text, int $id): array
    {
        $href = asset('posts/' . $id);
        $tagWithLink = "<a href=\"{$href}\">{$tag}</a>";
        $transformedText = preg_replace("~{$tagWithLink}~u", $tag, $text, -1, $replaceCount);
        return ['text' => $transformedText, 'status' => (bool)$replaceCount];
    }

    public function transformToLink(string $tag, ?string $text, int $id): array
    {
        $href = asset('posts/' . $id);
        $tagWithLink = "<a href=\"{$href}\">{$tag}</a>";
        $transformedText = preg_replace("~\b{$tag}\b~u", $tagWithLink, $text, -1, $replaceCount);
        return ['text' => $transformedText, 'status' => (bool)$replaceCount];
    }

    public function transformNewPostTextToLinks(?Collection $tags, ?string $text): array
    {
        $replaceAmount = 0;
        $transformedText = $text;
        if (count($tags)) {
            foreach ($tags as $tag) {
                $href = asset('posts/' . $tag->post_id);
                $tagWithLink = "<a href=\"{$href}\">{$tag->name}</a>";
                $transformedText = preg_replace("~\b{$tag->name}\b~u", $tagWithLink, $transformedText, -1, $replaceCount);
                $replaceAmount += $replaceCount;
            }
        }
        return ['text' => $transformedText, 'status' => (bool)$replaceAmount];
    }

    public function transformExistingPostTextToLinks(?Collection $tags, ?string $text): array
    {
        $replaceAmount = 0;
        $transformedText = $text;
        if (count($tags)) {
            foreach ($tags as $tag) {
                $href = asset('posts/' . $tag->post_id);
                $tagWithLink = "<a href=\"{$href}\">{$tag->name}</a>";
                $transformedText = preg_replace("~{$tagWithLink}~u", $tag->name, $transformedText, -1, $replaceCount);
            }
            foreach ($tags as $tag) {
                $href = asset('posts/' . $tag->post_id);
                $tagWithLink = "<a href=\"{$href}\">{$tag->name}</a>";
                $transformedText = preg_replace("~\b{$tag->name}\b~u", $tagWithLink, $transformedText, -1, $replaceCount);
                $replaceAmount += $replaceCount;
            }
        }
        return ['text' => $transformedText, 'status' => (bool)$replaceAmount];
    }
}
