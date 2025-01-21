<?php

namespace App\Http\Controllers;

use App\Contracts\UrlInterface;
use App\Http\Requests\ShortenUrlRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UrlController extends Controller
{
    private UrlInterface $urlInterface;

    public function __construct(UrlInterface $urlInterface)
    {
        $this->urlInterface = $urlInterface;
    }

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $conditions = []; // currently no condition/sorting/searching apply
        $urls = $this->urlInterface->getUrls($conditions);
//        dd($urls);
        return view('url.index', compact('urls'));
    }

    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('url.create');
    }

    public function storeUrlMap(ShortenUrlRequest $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $created = $this->urlInterface->shortenUrl($request->original_url, $request?->about);
        if (!$created) {
            Session::flash('error', 'Fail to create URL map');
            return redirect()->back();
        } else {
            Session::flash('success', 'URL map created successfully');
            return redirect(route('urls.index'));
        }
    }

    public function redirectToLongUrl($shortUrl)
    {
        $longUrl = $this->urlInterface->getLongUrlByShortUrl($shortUrl);
        if ($longUrl) {
            return Redirect::to($longUrl);
        } else {
            abort(404);
        }
    }
}
