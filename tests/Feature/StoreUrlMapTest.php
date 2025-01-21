<?php

use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\postJson;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

it('can shorten a valid URL via form submission', function () {
    $longUrl = 'https://example.com';

    $response = post('/shorten', [
        'original_url' => $longUrl,
    ]);
    $response->assertStatus(302);
    $response->assertRedirect(route('urls.index'));
});


it('fails to shorten an invalid URL', function () {
    $invalidUrl = 'invalid-url';

    $response = postJson('/shorten', [
        'original_url' => $invalidUrl,
    ]);
    $response->assertStatus(422);
//    dd($response->status());
    $response->assertJsonValidationErrors(['original_url']);
//    $response->assertRedirect(route('urls.index'));
});
