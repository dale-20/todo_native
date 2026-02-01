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
                <img src="{{ asset($profile_image) }}" alt="user_image"
                    style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <span style="color: #a0d5f1; font-weight: 500;">{{ session('user_name', 'User') }}</span>
        </a>
    </li>
@endsection

@section('content')
    <div style="width: 1100px; margin: 0 auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h1>Tasks</h1>
            <a href="{{ route('tasks.create') }}" class="btn" style="margin-top: 1rem;">
                <i class="fas fa-add"></i> Add
            </a>
        </div>
        <div class="card" style="padding: 2rem;">
            @if ($tasks && count($tasks) > 0)
                @foreach ($tasks as $index => $task)
                    <div class="task-item"
                        style="display: flex; justify-content: space-between; align-items: center; padding: 1rem; margin-bottom: 1rem; border: 1px solid #252538; border-radius: 6px; background: #2c2b2b;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <span class="task-number"
                                style="background: #3b82f6; color: white; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                {{ $index + 1 }}
                            </span>
                            <h3 style="margin: 0; font-size: 1.1rem; color: #3b82f6;">{{ $task->title }}</h3>
                        </div>

                        <div class="task-actions" style="display: flex; gap: 0.5rem;">
                            <a href="{{ route('tasks.edit', $task) }}" class="btn-edit"
                                style="background: #098d61; color: white; border: none; padding: 0.5rem 1rem; border-radius: 4px; cursor: pointer; font-size: 0.9rem; text-decoration: none;">
                                Edit
                            </a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="margin: 0" ;>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete"
                                    style="background: #b61818; color: white; border: none; padding: 0.5rem 1rem; border-radius: 4px; cursor: pointer; font-size: 0.9rem;"
                                    onclick="return confirm('Are you sure you want to delete this task?')">
                                    Delete
                                </button>
                            </form>
                            </button>
                        </div>
                    </div>
                @endforeach
            @else
                <div style="text-align: center; padding: 3rem; color: #64748b;">
                    <h2 style="margin: 0; font-size: 1.5rem;">No Task Yet</h2>
                    <p style="margin-top: 0.5rem;">Add your first task!</p>
                </div>
            @endif
        </div>

    </div>
@endsection