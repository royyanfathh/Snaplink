@extends('layouts.app')

@section('title', 'SnapLink')
@section('meta_description', 'Persingkat URL panjang menjadi link pendek yang mudah dibagikan secara gratis dan instan.')

@section('content')

<section class="hero">
    {{-- Floating Neobrutalist Shapes --}}
    <div class="floating-shapes-container">
        <!-- Orange Star/Flower badge -->
        <div class="floating-shape shape-1">
            <svg width="80" height="80" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M50 5 L61 24 L82 17 L77 38 L95 50 L77 62 L82 83 L61 76 L50 95 L39 76 L18 83 L23 62 L5 50 L23 38 L18 17 L39 24 Z" fill="var(--accent-red)" stroke="var(--ink)" stroke-width="4" stroke-linejoin="miter"/>
            </svg>
        </div>
        <!-- Blue Star/Asterisk -->
        <div class="floating-shape shape-2">
            <svg width="90" height="90" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M50 0 L58 35 L90 20 L68 45 L95 70 L60 70 L50 100 L40 70 L5 70 L32 45 L10 20 L42 35 Z" fill="var(--accent-blue)" stroke="var(--ink)" stroke-width="4" stroke-linejoin="miter"/>
            </svg>
        </div>
        <!-- Green Asterisk/Badge -->
        <div class="floating-shape shape-3">
            <svg width="70" height="70" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M50 10 L50 90 M10 50 L90 50 M22 22 L78 78 M22 78 L78 22" stroke="var(--accent-green)" stroke-width="12" stroke-linecap="square"/>
            </svg>
        </div>
        <!-- Yellow Staircase/L-shape -->
        <div class="floating-shape shape-4">
            <svg width="75" height="75" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 15 H85 V45 H50 V85 H15 Z" fill="var(--accent-yellow)" stroke="var(--ink)" stroke-width="4" stroke-linejoin="miter"/>
            </svg>
        </div>
        <!-- Curly Handdrawn Arrow Left -->
        <div class="floating-shape shape-5">
            <svg width="80" height="80" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 80 C 10 50, 40 20, 80 40 C 90 45, 75 70, 60 60 C 50 50, 65 30, 45 40" stroke="var(--ink)" stroke-width="4" fill="none" stroke-linecap="round"/>
                <path d="M55 25 L45 40 L60 48" stroke="var(--ink)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <!-- Brutal badge with offset shadow -->
        <div class="floating-shape shape-6">
            <div class="brutal-badge">LINK.ZIP</div>
        </div>
    </div>

    {{-- Eyebrow --}}
    <div class="hero-eyebrow">
        <div class="eyebrow-dot"></div>
        >>> {{ __('messages.hero.eyebrow') }}
        <div class="eyebrow-dot"></div>
    </div>

    {{-- Heading --}}
    <h1 class="hero-title">
        <span class="dim">{{ __('messages.hero.title_dim') }}</span>
        {{ __('messages.hero.title_main') }}
    </h1>

    <p class="hero-subtitle">
        {{ __('messages.hero.subtitle') }}
    </p>

    {{-- ── FORM CARD ── --}}
    <div class="form-card">

        {{-- Mode Tabs --}}
        <div class="slug-tabs" role="tablist" aria-label="Slug mode">
            <button
                type="button"
                id="tab-auto"
                class="slug-tab active"
                role="tab"
                aria-selected="true"
                aria-controls="panel-auto"
                onclick="setMode('auto')"
            >
                {{-- Shuffle icon --}}
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="16 3 21 3 21 8"/>
                    <line x1="4" y1="20" x2="21" y2="3"/>
                    <polyline points="21 16 21 21 16 21"/>
                    <line x1="15" y1="15" x2="21" y2="21"/>
                </svg>
                {{ __('messages.form.random_slug') }}
            </button>
            <button
                type="button"
                id="tab-custom"
                class="slug-tab"
                role="tab"
                aria-selected="false"
                aria-controls="panel-custom"
                onclick="setMode('custom')"
            >
                {{-- Edit icon --}}
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                </svg>
                {{ __('messages.form.custom_slug') }}
            </button>
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ route('shorten') }}" id="shorten-form">
            @csrf

            {{-- Hidden mode field --}}
            <input type="hidden" name="slug_type" id="slug-type-input" value="{{ old('slug_type', 'auto') }}">

            {{-- URL Input --}}
            <label for="url-input" class="form-label">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                </svg>
                {{ __('messages.form.url_label') }}
            </label>
            <div class="input-group">
                <input
                    id="url-input"
                    type="url"
                    name="url"
                    class="url-input"
                    placeholder="{{ __('messages.form.url_placeholder') }}"
                    value="{{ old('url') }}"
                    autocomplete="off"
                    required
                >
            </div>

            {{-- Custom Slug Section --}}
            <div class="custom-slug-section {{ old('slug_type') === 'custom' ? 'visible' : '' }}" id="custom-slug-panel">
                <label for="custom-code" class="form-label" style="margin-top:16px;">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/>
                        <line x1="7" y1="7" x2="7.01" y2="7"/>
                    </svg>
                    {{ __('messages.form.custom_slug_label') }}
                </label>
                <div class="slug-input-wrapper">
                    <span class="slug-prefix" id="slug-prefix-text">{{ url('/') }}/</span>
                    <input
                        id="custom-code"
                        type="text"
                        name="custom_code"
                        class="slug-input"
                        placeholder="{{ __('messages.form.custom_slug_placeholder') }}"
                        value="{{ old('custom_code') }}"
                        autocomplete="off"
                        maxlength="30"
                    >
                </div>
                <p class="slug-hint">/// {{ __('messages.form.custom_slug_hint') }}</p>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-shorten" id="submit-btn">
                <span id="btn-content" style="display:flex;align-items:center;gap:8px;">
                    >>> {{ __('messages.form.btn_shorten') }}
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </span>
            </button>
        </form>

        {{-- ── SUCCESS RESULT ── --}}
        @if (session('short_url'))
        <div class="alert alert-success" id="result-box">
            <div class="alert-icon">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
            </div>
            <div class="alert-body">
                <div class="alert-title">[ {{ __('messages.result.success') }} ]</div>
                    <div class="short-url-row">
                        <a
                            href="{{ session('short_url') }}"
                            class="short-url-link"
                            target="_blank"
                            rel="noopener noreferrer"
                        >{{ session('short_url') }}</a>

                        {{-- Copy button --}}
                        <button
                            class="btn-copy"
                            id="copy-btn"
                            type="button"
                            onclick="copyUrl('{{ session('short_url') }}', 'copy-btn', 'copy-icon-svg', 'copy-label')"
                        >
                            <svg id="copy-icon-svg" width="12" height="12" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2.5"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="0" ry="0"/>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                            </svg>
                            <span id="copy-label">{{ __('messages.result.copy') }}</span>
                        </button>

                        {{-- QR Code button --}}
                        <button
                            class="btn-qr"
                            type="button"
                            onclick="openQrModal('{{ session('short_url') }}')"
                        >
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2.5"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="7" height="7"/>
                                <rect x="14" y="3" width="7" height="7"/>
                                <rect x="3" y="14" width="7" height="7"/>
                                <rect x="14" y="14" width="3" height="3"/>
                                <line x1="17" y1="20" x2="21" y2="20"/>
                                <line x1="21" y1="17" x2="21" y2="20"/>
                            </svg>
                            {{ __('messages.result.qr_code') }}
                        </button>
                    </div>
            </div>
        </div>
        @endif

        {{-- ── VALIDATION ERRORS ── --}}
        @if ($errors->any())
        <div class="alert alert-error">
            <div class="alert-icon">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="8" x2="12" y2="12"/>
                    <line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
            </div>
            <div class="alert-body">
                <div class="alert-title">
                    [ {{ $errors->has('custom_code') ? __('messages.form.validation.invalid_slug') : __('messages.form.validation.invalid_url') }} ]
                </div>
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>/// {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

    </div>{{-- end .form-card --}}

    {{-- ── STATS ── --}}
    <div class="divider" style="margin-top:48px;"></div>
    <div class="stats-strip">
        <div class="stat-item">
            <div class="stat-value">∞</div>
            <div class="stat-label">[ No Limits ]</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">&lt;1s</div>
            <div class="stat-label">[ Processing ]</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">100%</div>
            <div class="stat-label">[ Free Forever ]</div>
        </div>
    </div>
    <div class="divider" style="margin-top:0; margin-bottom:40px;"></div>

    {{-- ── FEATURE CARDS ── --}}
    <div class="features">
        <div class="feature-card">
            <div class="feature-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
                </svg>
            </div>
            <div class="feature-title">{{ __('messages.features.instant_title') }}</div>
            <div class="feature-desc">{{ __('messages.features.instant_desc') }}</div>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="20" x2="18" y2="10"/>
                    <line x1="12" y1="20" x2="12" y2="4"/>
                    <line x1="6"  y1="20" x2="6"  y2="14"/>
                </svg>
            </div>
            <div class="feature-title">{{ __('messages.features.track_title') }}</div>
            <div class="feature-desc">{{ __('messages.features.track_desc') }}</div>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
            </div>
            <div class="feature-title">{{ __('messages.features.reliable_title') }}</div>
            <div class="feature-desc">{{ __('messages.features.reliable_desc') }}</div>
        </div>
    </div>

</section>

@endsection

@push('scripts')
<script>
    /* ── Slug mode toggle ── */
    function setMode(mode) {
        const tabAuto   = document.getElementById('tab-auto');
        const tabCustom = document.getElementById('tab-custom');
        const panel     = document.getElementById('custom-slug-panel');
        const input     = document.getElementById('slug-type-input');
        const codeInput = document.getElementById('custom-code');

        if (mode === 'custom') {
            tabAuto.classList.remove('active');
            tabAuto.setAttribute('aria-selected', 'false');
            tabCustom.classList.add('active');
            tabCustom.setAttribute('aria-selected', 'true');
            panel.classList.add('visible');
            codeInput.required = true;
        } else {
            tabCustom.classList.remove('active');
            tabCustom.setAttribute('aria-selected', 'false');
            tabAuto.classList.add('active');
            tabAuto.setAttribute('aria-selected', 'true');
            panel.classList.remove('visible');
            codeInput.required = false;
        }

        input.value = mode;
    }

    /* ── Restore tab state on validation error ── */
    (function () {
        const oldMode = '{{ old('slug_type', 'auto') }}';
        if (oldMode === 'custom') setMode('custom');
    })();

    /* ── Loading state on submit ── */
    document.getElementById('shorten-form').addEventListener('submit', function () {
        const btn     = document.getElementById('submit-btn');
        const content = document.getElementById('btn-content');
        content.innerHTML = '<span class="spinner"></span> PROCESSING...';
        btn.disabled = true;
    });

    /* ── Auto scroll to result ── */
    const resultBox = document.getElementById('result-box');
    if (resultBox) {
        setTimeout(() => resultBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' }), 200);
    }
</script>
@endpush
