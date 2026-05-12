<?php

return [
    'nav' => [
        'shorten' => 'Perpendek',
        'analytics' => 'Statistik',
    ],
    'hero' => [
        'eyebrow' => 'URL Shortener',
        'title_dim' => 'Mudah.',
        'title_main' => 'Cepat. Andal.',
        'subtitle' => 'Persingkat URL panjang Anda menjadi link pendek yang mudah dibagikan secara gratis dan instan.',
    ],
    'form' => [
        'random_slug' => 'Slug Acak',
        'custom_slug' => 'Slug Kustom',
        'url_label' => 'Masukkan URL panjang',
        'url_placeholder' => 'https://example.com/url/yang/sangat/panjang',
        'custom_slug_label' => 'Slug Kustom',
        'custom_slug_placeholder' => 'link-kustom-saya',
        'custom_slug_hint' => 'Hanya huruf, angka, dan tanda hubung ( - _ ). Min. 3, maks. 30 karakter.',
        'btn_shorten' => 'Perpendek URL',
        'validation' => [
            'url_required' => 'URL tidak boleh kosong.',
            'url_invalid' => 'Format URL tidak valid. Pastikan dimulai dengan https:// atau http://.',
            'url_max' => 'URL terlalu panjang (maks. 2048 karakter).',
            'slug_required' => 'Slug tidak boleh kosong saat mode Custom dipilih.',
            'slug_alpha_dash' => 'Slug hanya boleh berisi huruf, angka, tanda hubung (-), dan underscore (_).',
            'slug_min' => 'Slug minimal 3 karakter.',
            'slug_max' => 'Slug maksimal 30 karakter.',
            'slug_unique' => 'Slug ini sudah digunakan. Silakan pilih yang lain.',
            'invalid_slug' => 'Slug Tidak Valid',
            'invalid_url' => 'URL Tidak Valid',
        ],
    ],
    'result' => [
        'success' => 'URL berhasil dipersingkat',
        'copy' => 'Salin',
        'copied' => 'Disalin',
        'qr_code' => 'QR Code',
    ],
    'features' => [
        'instant_title' => 'Instan',
        'instant_desc' => 'URL dipersingkat dalam milidetik tanpa waktu tunggu.',
        'track_title' => 'Lacak Klik',
        'track_desc' => 'Monitor jumlah klik pada setiap link yang dibuat.',
        'reliable_title' => 'Andal',
        'reliable_desc' => 'Link aktif permanen, redirect otomatis ke URL asli.',
    ],
    'stats' => [
        'total_links' => 'Total Link',
        'total_hits' => 'Total Klik',
        'avg_hits' => 'Rata-rata Klik',
    ],
    'analytics' => [
        'title' => 'Statistik Link',
        'subtitle' => 'Data performa mendalam untuk semua link pendek Anda.',
        'btn_new' => 'Buat URL Baru',
        'empty_title' => 'Belum ada URL',
        'empty_desc' => 'Mulai dengan mempersingkat URL pertama Anda.',
        'table' => [
            'original' => 'URL Asli',
            'short' => 'URL Pendek',
            'qr' => 'QR',
            'hits' => 'Klik',
            'created' => 'Dibuat',
        ],
    ],
    'qr_modal' => [
        'title' => 'QR Code',
        'download' => 'Unduh PNG',
        'copy_url' => 'Salin URL',
    ],
    'footer' => [
        'built_with' => 'Dibangun dengan',
    ],
];
