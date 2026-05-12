<?php

return [
    'nav' => [
        'shorten' => 'Shorten',
        'analytics' => 'Analytics',
    ],
    'hero' => [
        'eyebrow' => 'URL Shortener',
        'title_dim' => 'Simple.',
        'title_main' => 'Fast. Reliable.',
        'subtitle' => 'Shorten your long URLs into short, easy-to-share links for free and instantly.',
    ],
    'form' => [
        'random_slug' => 'Random Slug',
        'custom_slug' => 'Custom Slug',
        'url_label' => 'Enter long URL',
        'url_placeholder' => 'https://example.com/very/long/url',
        'custom_slug_label' => 'Custom Slug',
        'custom_slug_placeholder' => 'my-custom-url',
        'custom_slug_hint' => 'Only letters, numbers, and hyphens (- _). Min 3, max 30 characters.',
        'btn_shorten' => 'Shorten URL',
        'validation' => [
            'url_required' => 'URL is required.',
            'url_invalid' => 'Invalid URL format. Make sure it starts with https:// or http://.',
            'url_max' => 'URL is too long (max 2048 characters).',
            'slug_required' => 'Slug is required when Custom mode is selected.',
            'slug_alpha_dash' => 'Slug may only contain letters, numbers, hyphens (-), and underscores (_).',
            'slug_min' => 'Slug must be at least 3 characters.',
            'slug_max' => 'Slug may not be greater than 30 characters.',
            'slug_unique' => 'This slug is already taken. Please choose another one.',
            'invalid_slug' => 'Invalid Slug',
            'invalid_url' => 'Invalid URL',
        ],
    ],
    'result' => [
        'success' => 'URL shortened successfully',
        'copy' => 'Copy',
        'copied' => 'Copied',
        'qr_code' => 'QR Code',
    ],
    'features' => [
        'instant_title' => 'Instant',
        'instant_desc' => 'URLs are shortened in milliseconds with no waiting time.',
        'track_title' => 'Track Clicks',
        'track_desc' => 'Monitor the number of clicks on every link you create.',
        'reliable_title' => 'Reliable',
        'reliable_desc' => 'Links are permanently active, with automatic redirection to the original URL.',
    ],
    'stats' => [
        'total_links' => 'Total Links',
        'total_hits' => 'Total Hits',
        'avg_hits' => 'Avg. Hits',
    ],
    'analytics' => [
        'title' => 'Link Analytics',
        'subtitle' => 'Detailed performance data for all your shortened links.',
        'btn_new' => 'Create New URL',
        'empty_title' => 'No URLs yet',
        'empty_desc' => 'Start by shortening your first URL.',
        'table' => [
            'original' => 'Original URL',
            'short' => 'Short URL',
            'qr' => 'QR',
            'hits' => 'Hits',
            'created' => 'Created',
        ],
    ],
    'qr_modal' => [
        'title' => 'QR Code',
        'download' => 'Download PNG',
        'copy_url' => 'Copy URL',
    ],
    'footer' => [
        'built_with' => 'Built with',
    ],
];
