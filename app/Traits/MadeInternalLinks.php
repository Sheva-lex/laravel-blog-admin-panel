<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;

use function PHPUnit\Framework\isEmpty;

trait MadeInternalLinks
{
    public function removeLink(string $tag, ?string $text, int $id): array
    {
        $href = asset('posts/' . $id);
        $tagWithLink = "~<a href=\"{$href}\">{$tag}</a>~";
        $transformedText = preg_replace($tagWithLink, $tag, $text, -1, $replaceCount);
        return ['text' => $transformedText, 'status' => (bool)$replaceCount];
    }

    public function transformToLink(string $tag, ?string $text, int $id): array
    {
        $transformedStatus = 0;
        $words = explode(" ", $text);
        foreach ($words as $key => $value) {
            if ($value === $tag) {
                $href = asset('posts/' . $id);
                $words[$key] = "<a href=\"{$href}\">{$value}</a>";
                $transformedStatus = 1;
            }
        }
        return ['text' => implode(" ", $words), 'status' => $transformedStatus];
    }

    public function transformNewPostTextToLinks(?Collection $tags, ?string $text): array
    {
        $replaceAmount = 0;
        $transformedText = $text;
        if (count($tags)) {
            foreach ($tags as $tag) {
                $href = asset('posts/' . $tag->post_id);
                $tagWithLink = "<a href=\"{$href}\">{$tag->name}</a>";
                $transformedText = preg_replace("~{$tag->name}~", $tagWithLink, $transformedText, -1, $replaceCount);
                $replaceAmount += $replaceCount;
            }
        }
        return ['text' => $transformedText, 'status' => (bool)$replaceAmount];
    }
}
