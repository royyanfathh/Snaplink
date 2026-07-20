@extends('layouts.app')

@section('title', 'Analytics')
@section('meta_description', 'Lihat statistik semua URL yang telah dipersingkat — original URL, short URL, dan total klik.')

@section('content')

<div class="page-container">

    {{-- ── PAGE HEADER ── --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">{{ __('messages.analytics.title') }}</h1>
            <p class="page-subtitle">/// {{ __('messages.analytics.subtitle') }}</p>
        </div>
        <a href="{{ route('home') }}" class="btn-new">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2.5"
                 stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            {{ __('messages.analytics.btn_new') }}
        </a>
    </div>

    {{-- ── SUMMARY CARDS ── --}}
    <div class="summary-cards">

        <div class="summary-card">
            <div class="summary-icon">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                </svg>
            </div>
            <div class="summary-body">
                <div class="summary-value">{{ number_format($totalLinks) }}</div>
                <div class="summary-label">[ {{ __('messages.stats.total_links') }} ]</div>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                </svg>
            </div>
            <div class="summary-body">
                <div class="summary-value">{{ number_format($totalHits) }}</div>
                <div class="summary-label">[ {{ __('messages.stats.total_hits') }} ]</div>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12 6 12 12 16 14"/>
                </svg>
            </div>
            <div class="summary-body">
                <div class="summary-value">
                    {{ $totalLinks > 0 ? number_format($totalHits / $totalLinks, 1) : '0' }}
                </div>
                <div class="summary-label">[ {{ __('messages.stats.avg_hits') }} ]</div>
            </div>
        </div>

    </div>

    {{-- ── URL TABLE ── --}}
    @if ($urls->isEmpty())

        <div class="empty-state">
            <div class="empty-icon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                </svg>
            </div>
            <p class="empty-title">[ {{ __('messages.analytics.empty_title') }} ]</p>
            <p class="empty-desc">{{ __('messages.analytics.empty_desc') }}</p>
            <a href="{{ route('home') }}" class="btn-new" style="margin-top:20px;">{{ __('messages.analytics.btn_new') }}</a>
        </div>

    @else

        <div class="table-wrapper">
            <table class="url-table">
                <thead>
                    <tr>
                        <th class="col-original">{{ __('messages.analytics.table.original') }}</th>
                        <th class="col-short">{{ __('messages.analytics.table.short') }}</th>
                        <th class="col-qr">{{ __('messages.analytics.table.qr') }}</th>
                        <th class="col-hits">
                            <div style="display:flex;align-items:center;gap:5px;justify-content:center;">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2.5"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                                </svg>
                                {{ __('messages.analytics.table.hits') }}
                            </div>
                        </th>
                        <th class="col-date">{{ __('messages.analytics.table.created') }}</th>
                        <th class="col-action"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($urls as $item)
                    <tr class="table-row">

                        {{-- Original URL --}}
                        <td class="col-original">
                            <div class="original-url-cell">
                                <span class="original-url-text" title="{{ $item->original_url }}">
                                    {{ $item->original_url }}
                                </span>
                                <a href="{{ $item->original_url }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="cell-link-btn"
                                   title="Buka URL asli">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="2.5"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                                        <polyline points="15 3 21 3 21 9"/>
                                        <line x1="10" y1="14" x2="21" y2="3"/>
                                    </svg>
                                </a>
                            </div>
                        </td>

                        {{-- Short URL --}}
                        <td class="col-short">
                            <div class="short-url-cell">
                                <a href="{{ url($item->short_code) }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="short-url-badge">
                                    {{ $item->short_code }}
                                </a>
                            </div>
                        </td>

                        {{-- QR Code Column --}}
                        <td class="col-qr">
                            <button
                                class="btn-qr-row"
                                type="button"
                                title="Tampilkan QR Code"
                                onclick="openQrModal('{{ url($item->short_code) }}')"
                            >
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2.5"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="7" height="7"/>
                                    <rect x="14" y="3" width="7" height="7"/>
                                    <rect x="3" y="14" width="7" height="7"/>
                                    <rect x="14" y="14" width="3" height="3"/>
                                    <line x1="17" y1="20" x2="21" y2="20"/>
                                    <line x1="21" y1="17" x2="21" y2="20"/>
                                </svg>
                            </button>
                        </td>

                        {{-- Hits --}}
                        <td class="col-hits">
                            <span class="hits-badge {{ $item->hits > 0 ? 'hits-active' : '' }}">
                                {{ number_format($item->hits) }}
                            </span>
                        </td>

                        {{-- Created at --}}
                        <td class="col-date">
                            <span class="date-text" title="{{ $item->created_at->format('d M Y, H:i') }}">
                                {{ $item->created_at->diffForHumans() }}
                            </span>
                        </td>

                        {{-- Actions --}}
                        <td class="col-action">
                            <div style="display:flex;gap:6px;justify-content:flex-end;">
                                {{-- Copy --}}
                                <button
                                    class="btn-copy-row"
                                    id="copy-btn-{{ $item->id }}"
                                    type="button"
                                    title="{{ __('messages.result.copy') }}"
                                    onclick="copyUrl(
                                        '{{ url($item->short_code) }}',
                                        'copy-btn-{{ $item->id }}',
                                        'copy-icon-{{ $item->id }}',
                                        'copy-label-{{ $item->id }}'
                                    )"
                                >
                                    <svg id="copy-icon-{{ $item->id }}"
                                         width="12" height="12" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2.5"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="0" ry="0"/>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                                    </svg>
                                    <span id="copy-label-{{ $item->id }}">{{ __('messages.result.copy') }}</span>
                                </button>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endif

</div>{{-- end .page-container --}}

@endsection
