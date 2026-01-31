@extends('layout')
@section('title', 'Tasks Test')

@section('nav-links')
    <li>
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" style="background: none; border: none; color: #a0d5f1; cursor: pointer; padding: 0.5rem 1rem;">Logout</button>
        </form>
    </li>
@endsection

@section('content')
    <h1>Testing Tasks View</h1>
    
    <pre>
        Tasks Count: {{ count($tasks ?? []) }}
        Tasks Data: {{ json_encode($tasks ?? [], JSON_PRETTY_PRINT) }}
    </pre>
@endsection