@extends('layout')
@section('title', 'Tasks Test')



@section('content')
    <div style="width: 100%; max-width: 800px;  min-width: 500px; margin: 0 auto; padding: 2rem;">
        <div style="text-align: center; margin-bottom: 2rem;">
            <h2 style="color: #4babeb; margin-bottom: 1rem;">Edit Task</h2>
        </div>

        <!-- Form Container -->
        <div class="card" style="padding: 2rem;">
            <form method="POST" action="{{ route('tasks.update', $task) }}">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; color: #a0d5f1; font-weight: 500;">
                        <i class="fas fa-user" style="margin-right: 0.5rem;"></i>Task Title
                    </label>
                    <input type="text" name="title" style="width: 100%; padding: 0.8rem; background: rgba(40, 40, 40, 0.8); 
                                              border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 8px; 
                                              color: white; font-size: 1rem; transition: all 0.3s ease;"
                         value="{{ $task->title }}" required autofocus>
                    @error('title')
                        <span style="color: #ff6b6b; font-size: 0.875rem; margin-top: 0.25rem; display: block;">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                    <button type="submit" style="flex: 1; padding: 0.9rem; background: linear-gradient(135deg, #4babeb, #2e5885); 
                                               color: white; border: none; border-radius: 8px; font-weight: 600; 
                                               font-size: 1rem; cursor: pointer; transition: all 0.3s ease;">
                        <i class="fas fa-save" style="margin-right: 0.5rem;"></i>Save Changes
                    </button>
                    <a href="{{ route('tasks.index') }}" style="flex: 1; padding: 0.9rem; background: rgba(40, 40, 40, 0.8); 
                                          color: #a0d5f1; border: 1px solid rgba(255, 255, 255, 0.1); 
                                          border-radius: 8px; text-decoration: none; text-align: center; 
                                          font-weight: 600; transition: all 0.3s ease;">
                        <i class="fas fa-times" style="margin-right: 0.5rem;"></i>Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection