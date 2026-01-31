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
    <div style="width: 100%; max-width: 800px; margin: 0 auto; padding: 2rem;">
        <div style="text-align: center; margin-bottom: 2rem;">
            @if(session('success'))
                <div style="background: rgba(46, 125, 50, 0.2); color: #6bff7c; padding: 1rem; 
                                            border-radius: 8px; margin-bottom: 1rem; border-left: 4px solid #4CAF50;">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div style="background: rgba(244, 67, 54, 0.2); color: #ff6b6b; padding: 1rem; 
                                            border-radius: 8px; margin-bottom: 1rem; border-left: 4px solid #ff6b6b;">
                    @foreach($errors->all() as $error)
                        <p style="margin: 0.25rem 0;"><i class="fas fa-exclamation-circle"></i> {{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <h2 style="color: #4babeb; margin-bottom: 1rem;">Edit Profile</h2>

            <p style="color: #a0d5f1; font-size: 0.9rem;">Update your account information</p>
        </div>

        <!-- Form Container -->
        <div class="card" style="padding: 2rem;">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf

                <!-- Name Field -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; color: #a0d5f1; font-weight: 500;">
                        <i class="fas fa-user" style="margin-right: 0.5rem;"></i>Full Name
                    </label>
                    <input type="text" name="name" style="width: 100%; padding: 0.8rem; background: rgba(40, 40, 40, 0.8); 
                                              border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 8px; 
                                              color: white; font-size: 1rem; transition: all 0.3s ease;"
                        value="{{ $user->name }}" required autofocus>
                    @error('name')
                        <span style="color: #ff6b6b; font-size: 0.875rem; margin-top: 0.25rem; display: block;">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Email Field -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; color: #a0d5f1; font-weight: 500;">
                        <i class="fas fa-envelope" style="margin-right: 0.5rem;"></i>Email Address
                    </label>
                    <input type="email" name="email" style="width: 100%; padding: 0.8rem; background: rgba(40, 40, 40, 0.8); 
                                              border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 8px; 
                                              color: white; font-size: 1rem; transition: all 0.3s ease;"
                        value="{{ $user->email }}" required>
                    @error('email')
                        <span style="color: #ff6b6b; font-size: 0.875rem; margin-top: 0.25rem; display: block;">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Bio Field (Optional) -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; color: #a0d5f1; font-weight: 500;">
                        <i class="fas fa-edit" style="margin-right: 0.5rem;"></i>Bio (Optional)
                    </label>
                    <textarea name="bio" rows="4" style="width: 100%; padding: 0.8rem; background: rgba(40, 40, 40, 0.8); 
                                                 border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 8px; 
                                                 color: white; font-size: 1rem; resize: vertical;"
                        placeholder="Tell us about yourself...">{{ $user->bio }}</textarea>
                </div>

                <!-- Password Change Section -->
                <div style="background: rgba(50, 50, 50, 0.3); padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem;">
                    <h3 style="color: #71b6e3; margin-bottom: 1rem; font-size: 1.1rem;">
                        <i class="fas fa-key" style="margin-right: 0.5rem;"></i>Change Password
                    </h3>
                    <p style="color: #a0d5f1; font-size: 0.9rem; margin-bottom: 1rem;">
                        Leave these fields blank if you don't want to change your password
                    </p>

                    <!-- New Password -->
                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: block; margin-bottom: 0.5rem; color: #a0d5f1; font-weight: 500;">
                            New Password
                        </label>
                        <input type="password" name="password" style="width: 100%; padding: 0.8rem; background: rgba(40, 40, 40, 0.8); 
                                                  border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 8px; 
                                                  color: white; font-size: 1rem;" placeholder="Enter new password">
                        @error('password')
                            <span style="color: #ff6b6b; font-size: 0.875rem; margin-top: 0.25rem; display: block;">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; margin-bottom: 0.5rem; color: #a0d5f1; font-weight: 500;">
                            Confirm New Password
                        </label>
                        <input type="password" name="password_confirmation" style="width: 100%; padding: 0.8rem; background: rgba(40, 40, 40, 0.8); 
                                                  border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 8px; 
                                                  color: white; font-size: 1rem;" placeholder="Confirm new password">
                    </div>
                </div>

                <!-- Form Actions -->
                <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                    <button type="submit" style="flex: 1; padding: 0.9rem; background: linear-gradient(135deg, #4babeb, #2e5885); 
                                               color: white; border: none; border-radius: 8px; font-weight: 600; 
                                               font-size: 1rem; cursor: pointer; transition: all 0.3s ease;">
                        <i class="fas fa-save" style="margin-right: 0.5rem;"></i>Save Changes
                    </button>

                    <a href="{{ route('profile.show') }}" style="flex: 1; padding: 0.9rem; background: rgba(40, 40, 40, 0.8); 
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