<?php

namespace App\Services;

use App\Contracts\UrlInterface;
use App\Models\Url;
use Illuminate\Support\Str;

class UrlService implements UrlInterface
{

    public function getUrls(array $conditions = [], int $limit = 10)
    {
        $query = Url::query();
        foreach ($conditions as $key => $value) {
            $query->where($key, $value);
        }
        return $query->orderByDesc('updated_at')->paginate($limit);
    }

    public function shortenUrl(string $longUrl, string $about = null): string
    {
        $shortUrl = $this->generateShortUrl();
        return Url::create([
            'original_url' => $longUrl,
            'short_url' => $shortUrl,
            'about' => $about,
        ]);
    }

    public function getLongUrlByShortUrl(string $shortUrl)
    {
        $url = Url::where('short_url', $shortUrl)->first();
        return $url ? $url->original_url : null;
    }

    private function generateShortUrl(): string
    {
        do {
            $shortUrl = Str::random(6);
        } while (Url::where('short_url', $shortUrl)->exists());
        return $shortUrl;
    }
}
