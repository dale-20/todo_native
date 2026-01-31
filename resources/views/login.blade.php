@extends('layout')

@section('title', 'Login')


@section('nav-links')
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('register') }}">Sign Up</a></li>
@endsection

@section('content')
<h1>Login</h1>
<form method="POST" action="{{ route('login') }}">
    @csrf
    
    <div style="margin-bottom: 1.5rem;">
        <label style="display: block; margin-bottom: 0.5rem; color: #a0d5f1; font-weight: 500;">Email Address</label>
        <input type="email" name="email" 
               style="width: 100%; padding: 0.8rem; background: rgba(40, 40, 40, 0.8); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 5px; color: white; font-size: 1rem;"
               value="{{ old('email') }}"
               required autofocus>
        @error('email')
            <span style="color: #ff6b6b; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
        @enderror
    </div>
    
    <div style="margin-bottom: 1.5rem;">
        <label style="display: block; margin-bottom: 0.5rem; color: #a0d5f1; font-weight: 500;">Password</label>
        <input type="password" name="password"
               style="width: 100%; padding: 0.8rem; background: rgba(40, 40, 40, 0.8); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 5px; color: white; font-size: 1rem;"
               required>
        @error('password')
            <span style="color: #ff6b6b; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
        @enderror
    </div>
    
    <div style="margin-bottom: 1.5rem; display: flex; justify-content: space-between; align-items: center;">
        <label style="display: flex; align-items: center; gap: 0.5rem; color: #a0d5f1; cursor: pointer;">
            <input type="checkbox" name="remember" style="width: 1rem; height: 1rem;">
            <span>Remember me</span>
        </label>

    </div>
    
    <button type="submit" class="btn" style="width: 100%; margin-bottom: 1.5rem;">
        <i class="fas fa-sign-in-alt"></i> Sign In
    </button>
</form>

@if (Route::has('register'))
    <div style="text-align: center; color: #a0d5f1;">
        Don't have an account? 
        <a href="{{ route('register') }}" class="auth-link">Create one</a>
    </div>
@endif
@endsection

