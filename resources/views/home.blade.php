@extends('layout')
@section('title', 'Home- TODO native')

@section('nav-links')
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('register') }}">Sign Up</a></li>
@endsection

@section('content')
    <div style="text-align: center; padding: 2rem 0;">
        <h1>TODO List Native</h1>
        <p style="font-size: 1.3rem; color: #a0d5f1; margin-top: 1rem; max-width: 600px; margin: 1rem auto;">
            <i class="fas fa-quote-left" style="color: #4babeb;"></i>
            One at a time
            <i class="fas fa-quote-right" style="color: #4babeb;"></i>
        </p>

        <div class="card" style="max-width: 800px; margin: 2rem auto; text-align: left;">
            <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
                <div style="flex: 2; min-width: 300px;">
                    <p style="margin-top: 1rem; line-height: 1.7;">
                        From scattered thoughts to organized achievements, your productivity journey starts with one simple
                        task at a time.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection