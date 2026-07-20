@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="page-container" style="max-width: 500px; margin: 0 auto; padding-top: 100px;">
    
    <div class="page-header" style="justify-content: center; border-bottom: none; margin-bottom: 20px;">
        <h1 class="page-title" style="font-size: clamp(32px, 5vw, 48px);">[ REGISTER ]</h1>
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
                <div class="alert-title">[ REGISTRATION ERROR ]</div>
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>/// {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name" class="form-label">/// FULL NAME</label>
            <div class="input-group">
                <input
                    id="name"
                    type="text"
                    name="name"
                    class="url-input"
                    placeholder="John Doe"
                    value="{{ old('name') }}"
                    required
                    autofocus
                >
            </div>

            <label for="email" class="form-label" style="margin-top: 20px;">/// EMAIL ADDRESS</label>
            <div class="input-group">
                <input
                    id="email"
                    type="email"
                    name="email"
                    class="url-input"
                    placeholder="you@example.com"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <label for="password" class="form-label" style="margin-top: 20px;">/// PASSWORD</label>
            <div class="input-group">
                <input
                    id="password"
                    type="password"
                    name="password"
                    class="url-input"
                    placeholder="Create a password"
                    required
                >
            </div>

            <label for="password_confirmation" class="form-label" style="margin-top: 20px;">/// CONFIRM PASSWORD</label>
            <div class="input-group">
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    class="url-input"
                    placeholder="Repeat password"
                    required
                >
            </div>

            <button type="submit" class="btn-shorten" style="margin-top: 32px; width: 100%;">
                <span style="display:flex;align-items:center;gap:8px;justify-content:center;">
                    >>> CREATE ACCOUNT
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </span>
            </button>
            
            <div style="margin-top: 24px; text-align: center; font-family: 'JetBrains Mono', monospace; font-size: 12px; font-weight: 600;">
                <span style="color: var(--ink-muted);">ALREADY HAVE AN ACCOUNT?</span> 
                <a href="{{ route('login') }}" style="color: var(--ink); text-decoration: underline; text-underline-offset: 4px;">LOGIN HERE</a>
            </div>
        </form>
    </div>
</div>
@endsection
