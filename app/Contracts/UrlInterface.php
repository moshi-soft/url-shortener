<?php

namespace App\Contracts;

interface UrlInterface
{
    public function getUrls(array $conditions = [], int $limit = 10);

    public function shortenUrl(string $longUrl, string $about = null);

    public function getLongUrlByShortUrl(string $shortUrl);
}
