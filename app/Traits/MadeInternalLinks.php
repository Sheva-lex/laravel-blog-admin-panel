<?php

namespace App\Traits;

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
}
