<?php

use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use function Pest\Laravel\get;
use function Pest\Laravel\postJson;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

it('redirects to the original URL using the short URL', function () {
    $longUrl = 'https://example.com';
    $shortUrl = Str::random(6);

    Url::create([
        'original_url' => $longUrl,
        'short_url' => $shortUrl,
    ]);
//    dd($shortUrl);
    $response = get("d/{$shortUrl}");
//    dd($response);
//    dd($response->);
    $response->assertStatus(302); // 302 Found is a common status code for redirection
    $response->assertRedirect($longUrl);
});
