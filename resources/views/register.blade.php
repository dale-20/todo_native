@extends('layout')
@section('title', 'Register')

@section('nav-links')
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('register') }}">Sign Up</a></li>
@endsection

@section('content')
    <div style="width: 400px; margin: 0 auto;">
        <h2>Sign Up</h2>
        <form method="POST" action="{{ route('register') }}" style="max-width: 800px; margin: 0 auto; padding: 20px">
            @csrf

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: #a0d5f1; font-weight: 500;">Name</label>
                <input type="text" name="name"
                    style="width: 100%; padding: 0.8rem; background: rgba(40, 40, 40, 0.8); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 5px; color: white; font-size: 1rem;"
                    value="{{ old('email') }}" required autofocus>
                @error('name')
                    <span
                        style="color: #ff6b6b; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 1.5rem; padding:]">
                <label style="display: block; margin-bottom: 0.5rem; color: #a0d5f1; font-weight: 500;">Email</label>
                <input type="email" name="email"
                    style="width: 100%; padding: 0.8rem; background: rgba(40, 40, 40, 0.8); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 5px; color: white; font-size: 1rem;"
                    required>
                @error('email')
                    <span
                        style="color: #ff6b6b; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: #a0d5f1; font-weight: 500;">Password</label>
                <input type="password" name="password"
                    style="width: 100%; padding: 0.8rem; background: rgba(40, 40, 40, 0.8); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 5px; color: white; font-size: 1rem;"
                    required>
                @error('password')
                    <span
                        style="color: #ff6b6b; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: #a0d5f1; font-weight: 500;">Confirm
                    Password</label>
                <input type="password" name="password_confirmation"
                    style="width: 100%; padding: 0.8rem; background: rgba(40, 40, 40, 0.8); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 5px; color: white; font-size: 1rem;"
                    required>
                @error('password_confirmation')
                    <span
                        style="color: #ff6b6b; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                @enderror
            </div>


            <button type="submit" class="btn" style="width: 100%; margin-bottom: 1.5rem;">
                <i></i> Register
            </button>
        </form>
    </div>

@endsection
