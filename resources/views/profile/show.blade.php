@extends('layout')
@section('title', 'Tasks Test')

@section('nav-links')
    <li>
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit"
                style="background: none; border: none; color: #a0d5f1; cursor: pointer; padding: 0.5rem 1rem;">Logout</button>
        </form>
    </li>
@endsection


@section('content')
    <div style="width: 700px; margin: 0 auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h1>Profile</h1>
            <a href="{{ route('profile.showEdit') }}" class="btn" style="margin-top: 1rem;">
                <i class="fas fa-pencil"></i> Edit
            </a>
        </div>
        <div class="card" style="max-width: 800px; min-height: 300px; margin: 2rem auto;">
            <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 200px;">
                    <a href="{{ route('profile.showImage') }}" class="btn" style="margin-top: 1rem;  background: rgba(40, 40, 40, 0.8);">
                        <img src="{{ asset($user->profile_location) }}" alt="user_image"
                            style="width: 100%; height: auto; border-radius: 10px;">
                    </a>
                </div>
                <div style="flex: 2; min-width: 300px;">
                    <h2 style="color: #4babeb;">{{ $user->name }}</h2>
                    <p style="color: #71b6e3; margin-bottom: 0.5rem;">
                        <i class="fas fa-envelope"></i> {{$user->email}}
                    </p>
                    <h3>BIO:</h3>
                    <p style="margin-top: 1rem; line-height: 1.7;">
                        {{ $user->bio }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection