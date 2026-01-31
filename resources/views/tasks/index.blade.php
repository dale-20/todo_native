@extends('layout')
@section('title', 'Tasks Test')

@php
    use App\Models\User;

    $user = User::find(Session::get("user_id"));
    $profile_image = $user->profile_location;
@endphp

@section('nav-links')
    <li>
        <a href="{{ route('profile.show') }}"
            style="display: flex; align-items: center; text-decoration: none; padding: 0.5rem;">
            <div style="width: 40px; height: 40px; border-radius: 50%; overflow: hidden; margin-right: 0.5rem;">
                <img src="{{ asset($profile_image) }}" alt="user_image" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <span style="color: #a0d5f1; font-weight: 500;">{{ session('user_name', 'User') }}</span>
        </a>
    </li>
@endsection

@section('content')
    <div style="width: 1200px; margin: 0 auto;">
        <h1>Tasks</h1>

    </div>
@endsection