<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;

trait MadeInternalLinks
{
    public function removeLink(string $tag, ?string $text, int $postId): array
    {
        $href = asset('posts/' . $postId);
        $tagWithLink = "<a href=\"{$href}\">{$tag}</a>";
        $transformedText = preg_replace("~{$tagWithLink}~u", $tag, $text, -1, $replaceCount);
        return ['text' => $transformedText, 'count' => $replaceCount];
    }

    public function transformToLink(string $tag, ?string $text, int $postId): array
    {
        $href = asset('posts/' . $postId);
        $tagWithLink = "<a href=\"{$href}\">{$tag}</a>";
        $transformedText = preg_replace("~\b{$tag}\b~u", $tagWithLink, $text, -1, $replaceCount);
        return ['text' => $transformedText, 'count' => $replaceCount];
    }

    public function transformNewPostTextToLinks(?Collection $tags, ?string $text): array
    {
        $addLinkCount = 0;
        $transformedText = $text;
        if (count($tags)) {
            foreach ($tags as $tag) {
                $transformed = $this->transformToLink($tag->name, $transformedText, $tag->post_id);
                $transformedText = $transformed['text'];
                $addLinkCount += $transformed['count'];
            }
        }
        return ['text' => $transformedText, 'status' => (bool)$addLinkCount];
    }

    public function transformExistingPostTextToLinks(?Collection $tags, ?string $text, int $postId): array
    {
        $addLinkCount = 0;
        $removeLinkCount = 0;
        $transformedText = $text;
        $transformedStatus = false;
        if (count($tags)) {
            foreach ($tags as $tag) {
                if ($postId != $tag->post_id) {
                    $transformed = $this->removeLink($tag->name, $transformedText, $tag->post_id);
                    $transformedText = $transformed['text'];
                    $removeLinkCount += $transformed['count'];
                }
            }
            foreach ($tags as $tag) {
                if ($postId != $tag->post_id) {
                    $transformed = $this->transformToLink($tag->name, $transformedText, $tag->post_id);
                    $transformedText = $transformed['text'];
                    $addLinkCount += $transformed['count'];
                }
            }
            $transformedStatus = !($removeLinkCount === $addLinkCount);
        }
        return ['text' => $transformedText, 'status' => $transformedStatus];
    }
}
