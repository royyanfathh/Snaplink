@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="page-container" style="max-width: 500px; margin: 0 auto; padding-top: 100px;">
    
    <div class="page-header" style="justify-content: center; border-bottom: none; margin-bottom: 20px;">
        <h1 class="page-title" style="font-size: clamp(32px, 5vw, 48px);">[ LOGIN ]</h1>
    </div>

    <div class="form-card" style="padding: 32px;">
        
        @if ($errors->any())
        <div class="alert alert-error" style="margin-bottom: 24px;">
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
                <div class="alert-title">[ LOGIN ERROR ]</div>
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>/// {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email" class="form-label">/// EMAIL ADDRESS</label>
            <div class="input-group">
                <input
                    id="email"
                    type="email"
                    name="email"
                    class="url-input"
                    placeholder="you@example.com"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >
            </div>

            <label for="password" class="form-label" style="margin-top: 20px;">/// PASSWORD</label>
            <div class="input-group">
                <input
                    id="password"
                    type="password"
                    name="password"
                    class="url-input"
                    placeholder="Enter your password"
                    required
                >
            </div>

            <div style="margin-top: 20px; display: flex; align-items: center; gap: 8px;">
                <input type="checkbox" name="remember" id="remember" style="width: 20px; height: 20px; border: 2px solid var(--ink); border-radius: 0; appearance: none; background: var(--bg-primary); cursor: pointer;" onclick="this.style.background = this.checked ? 'var(--ink)' : 'var(--bg-primary)'">
                <label for="remember" style="font-family: 'JetBrains Mono', monospace; font-size: 12px; font-weight: 600; cursor: pointer;">REMEMBER ME</label>
            </div>

            <button type="submit" class="btn-shorten" style="margin-top: 32px; width: 100%;">
                <span style="display:flex;align-items:center;gap:8px;justify-content:center;">
                    >>> SIGN IN
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </span>
            </button>
            
            <div style="margin-top: 24px; text-align: center; font-family: 'JetBrains Mono', monospace; font-size: 12px; font-weight: 600;">
                <span style="color: var(--ink-muted);">DON'T HAVE AN ACCOUNT?</span> 
                <a href="{{ route('register') }}" style="color: var(--ink); text-decoration: underline; text-underline-offset: 4px;">REGISTER HERE</a>
            </div>
        </form>
    </div>
</div>
@endsection
