<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Persingkat URL panjang menjadi link pendek yang mudah dibagikan secara gratis dan instan.')">

    <title>@yield('title', 'SnapLink') — URL Shortener</title>

    {{-- Google Fonts: Archivo Black + Space Grotesk + JetBrains Mono --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Space+Grotesk:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Global CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Per-page CSS --}}
    @stack('styles')
</head>
<body>

<div class="wrapper">

    {{-- ── NAVBAR ── --}}
    <nav>
        <a href="{{ route('home') }}" class="nav-logo">
            <div class="logo-mark">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                </svg>
            </div>
            <span class="logo-text">SnapLink</span>
        </a>

        {{-- Navigation links --}}
        <div class="nav-links">
            <a href="{{ route('home') }}"
               class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="16 3 21 3 21 8"/>
                    <line x1="4" y1="20" x2="21" y2="3"/>
                    <polyline points="21 16 21 21 16 21"/>
                    <line x1="15" y1="15" x2="21" y2="21"/>
                </svg>
                <span>[ {{ __('messages.nav.shorten') }} ]</span>
            </a>
            @auth
            <a href="{{ route('analytics') }}"
               class="nav-link {{ request()->routeIs('analytics') ? 'active' : '' }}">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="20" x2="18" y2="10"/>
                    <line x1="12" y1="20" x2="12" y2="4"/>
                    <line x1="6"  y1="20" x2="6"  y2="14"/>
                </svg>
                <span>[ {{ __('messages.nav.analytics') }} ]</span>
            </a>
            
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="nav-link" style="background:none;border:none;cursor:pointer;">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>
                    <span>[ LOGOUT ]</span>
                </button>
            </form>
            @else
            <a href="{{ route('login') }}"
               class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}">
                <span>[ LOGIN ]</span>
            </a>
            <a href="{{ route('register') }}"
               class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}">
                <span>[ REGISTER ]</span>
            </a>
            @endauth

            {{-- Language Switcher --}}
            <div class="lang-switcher">
                <a href="{{ route('lang', 'en') }}" class="lang-btn {{ app()->getLocale() == 'en' ? 'active' : '' }}">EN</a>
                <span class="lang-sep">///</span>
                <a href="{{ route('lang', 'id') }}" class="lang-btn {{ app()->getLocale() == 'id' ? 'active' : '' }}">ID</a>
            </div>
        </div>
    </nav>

    {{-- ── PAGE CONTENT ── --}}
    @yield('content')

    {{-- ── FOOTER ── --}}
    <footer>
        {{ __('messages.footer.built_with') }} <a href="https://laravel.com" target="_blank" rel="noopener">Laravel</a>
        &nbsp;///&nbsp;
        &copy; {{ date('Y') }} SnapLink&reg;
    </footer>

    {{-- ── QR CODE MODAL ── --}}
    <div id="qr-modal" class="modal-overlay" role="dialog" aria-modal="true" aria-labelledby="qr-modal-title">
        <div class="modal-box" id="qr-modal-box">

            {{-- Header --}}
            <div class="modal-header">
                <div>
                    <h2 class="modal-title" id="qr-modal-title">[ {{ __('messages.qr_modal.title') }} ]</h2>
                    <p class="modal-subtitle" id="qr-modal-url"></p>
                </div>
                <button class="modal-close" onclick="closeQrModal()" aria-label="Tutup modal">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="3"
                         stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"/>
                        <line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                </button>
            </div>

            {{-- QR Canvas --}}
            <div class="modal-body">
                <div class="qr-canvas-wrapper">
                    <div id="qr-canvas"></div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="modal-footer">
                <button class="btn-qr-download" id="qr-download-btn" onclick="downloadQr()">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="7 10 12 15 17 10"/>
                        <line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                    {{ __('messages.qr_modal.download') }}
                </button>
                <button class="btn-qr-copy" id="qr-copy-btn" onclick="copyQrUrl()">
                    <svg id="qr-copy-icon" width="13" height="13" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <rect x="9" y="9" width="13" height="13" rx="0" ry="0"/>
                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                    </svg>
                    <span id="qr-copy-label">{{ __('messages.qr_modal.copy_url') }}</span>
                </button>
            </div>

        </div>
    </div>

</div>

{{-- ── QR Code Library (CDN) ── --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" defer></script>

{{-- ── GLOBAL SCRIPTS ── --}}
<script>
    /**
     * Copy text to clipboard with visual feedback.
     * @param {string} url
     * @param {string} btnId
     * @param {string} iconId
     * @param {string} labelId
     */
    function copyUrl(url, btnId, iconId, labelId) {
        const copyIcon = `
            <rect x="9" y="9" width="13" height="13" rx="0" ry="0"/>
            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
        `;
        const checkIcon = `<polyline points="20 6 9 17 4 12"/>`;

        const doFeedback = () => {
            const btn   = document.getElementById(btnId);
            const icon  = document.getElementById(iconId);
            const label = document.getElementById(labelId);
            if (!btn) return;

            btn.classList.add('copied');
            if (icon)  icon.innerHTML = checkIcon;
            if (label) label.textContent = 'Copied';

            setTimeout(() => {
                btn.classList.remove('copied');
                if (icon)  icon.innerHTML = copyIcon;
                if (label) label.textContent = 'Copy';
            }, 2500);
        };

        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(url).then(doFeedback).catch(() => fallbackCopy(url, doFeedback));
        } else {
            fallbackCopy(url, doFeedback);
        }
    }

    function fallbackCopy(text, cb) {
        const el = document.createElement('textarea');
        el.value = text;
        el.style.position = 'fixed';
        el.style.opacity  = '0';
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
        cb();
    }

    /* ─────────────────────────────────────────────
       QR Code Modal
    ───────────────────────────────────────────── */

    /** Currently active URL displayed in the QR modal */
    let _qrActiveUrl = '';

    /**
     * Open the QR modal and generate a QR code for the given URL.
     * @param {string} url - The short URL to encode
     */
    function openQrModal(url) {
        _qrActiveUrl = url;

        // Show the modal
        const modal = document.getElementById('qr-modal');
        modal.classList.add('visible');
        document.body.style.overflow = 'hidden';

        // Set subtitle text (truncated for display)
        document.getElementById('qr-modal-url').textContent = url;

        // Clear previous QR and render new one
        const canvas = document.getElementById('qr-canvas');
        canvas.innerHTML = '';

        // QRCode renders after the CDN script loads
        setTimeout(() => {
            new QRCode(canvas, {
                text:       url,
                width:      220,
                height:     220,
                colorDark:  '#1A1A1A',
                colorLight: '#ffffff',
                correctLevel: QRCode.CorrectLevel.H,
            });
        }, 0);
    }

    /**
     * Close the QR modal.
     * @param {MouseEvent|undefined} e - If provided, only close when clicking the overlay itself.
     */
    function closeQrModal(e) {
        // If called from overlay click, only close when the backdrop itself is clicked
        if (e && e.target !== document.getElementById('qr-modal')) return;

        document.getElementById('qr-modal').classList.remove('visible');
        document.body.style.overflow = '';
    }

    /** Download the QR code as a PNG file. */
    function downloadQr() {
        const img = document.querySelector('#qr-canvas img');
        const cvs = document.querySelector('#qr-canvas canvas');

        if (cvs) {
            const link      = document.createElement('a');
            link.download   = 'snaplink-qr.png';
            link.href       = cvs.toDataURL('image/png');
            link.click();
        } else if (img) {
            const link      = document.createElement('a');
            link.download   = 'snaplink-qr.png';
            link.href       = img.src;
            link.click();
        }
    }

    /** Copy the active QR URL to clipboard with button feedback. */
    function copyQrUrl() {
        copyUrl(_qrActiveUrl, 'qr-copy-btn', 'qr-copy-icon', 'qr-copy-label');
    }

    // Close modal on overlay click
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('qr-modal').addEventListener('click', closeQrModal);
    });

    // Close modal on ESC key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeQrModal();
    });
</script>

{{-- Per-page scripts --}}
@stack('scripts')

</body>
</html>
