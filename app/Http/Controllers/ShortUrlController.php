<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    /**
     * Show the URL shortener form.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Switch language between 'en' and 'id'.
     */
    public function setLanguage(string $lang)
    {
        if (in_array($lang, ['en', 'id'])) {
            session(['locale' => $lang]);
        }
        return back();
    }

    /**
     * Store a new shortened URL (auto or custom slug).
     */
    public function store(Request $request)
    {
        $isCustom = $request->input('slug_type') === 'custom';

        // Validation rules
        $rules = [
            'url'       => ['required', 'url', 'max:2048'],
            'slug_type' => ['required', 'in:auto,custom'],
        ];

        if ($isCustom) {
            $rules['custom_code'] = [
                'required',
                'alpha_dash',
                'min:3',
                'max:30',
                'unique:short_urls,short_code',
            ];
        }

        // Translated validation messages
        $messages = [
            'url.required'           => __('messages.form.validation.url_required'),
            'url.url'                => __('messages.form.validation.url_invalid'),
            'url.max'                => __('messages.form.validation.url_max'),
            'custom_code.required'   => __('messages.form.validation.slug_required'),
            'custom_code.alpha_dash' => __('messages.form.validation.slug_alpha_dash'),
            'custom_code.min'        => __('messages.form.validation.slug_min'),
            'custom_code.max'        => __('messages.form.validation.slug_max'),
            'custom_code.unique'     => __('messages.form.validation.slug_unique'),
        ];

        $request->validate($rules, $messages);

        // Determine the short code to use
        if ($isCustom) {
            $code = $request->input('custom_code');
        } else {
            do {
                $code = Str::random(6);
            } while (ShortUrl::where('short_code', $code)->exists());
        }

        ShortUrl::create([
            'original_url' => $request->input('url'),
            'short_code'   => $code,
            'user_id'      => auth()->id(),
        ]);

        return back()->with('short_url', url($code));
    }

    /**
     * Show analytics — all shortened URLs with hit counts.
     */
    public function analytics()
    {
        $urls = ShortUrl::where('user_id', auth()->id())
                        ->orderByDesc('hits')
                        ->orderByDesc('created_at')
                        ->get();

        $totalHits  = $urls->sum('hits');
        $totalLinks = $urls->count();

        return view('analytics', compact('urls', 'totalHits', 'totalLinks'));
    }

    /**
     * Redirect a short code to the original URL.
     */
    public function redirect(string $code)
    {
        $short = ShortUrl::where('short_code', $code)->firstOrFail();

        $short->increment('hits');

        return redirect($short->original_url);
    }
}
