@extends('layout')
@section('title', 'Edit Profile Image')

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
    <div style="width: 100%; max-width: 800px; min-width: 500px; margin: 0 auto; padding: 2rem;">
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

            <h2 style="color: #4babeb; margin-bottom: 1rem;">Edit Profile Image</h2>

            <!-- Current Profile Image -->
            <div style="width: 150px; height: 150px; margin: 0 auto 1.5rem auto; border-radius: 50%; 
                            overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
                <img src="{{ asset($user->profile_location)}}"
                    alt="user_image" id="image-preview" style="width: 100%; height: 100%; object-fit: cover;">
            </div>

            <p style="color: #a0d5f1; font-size: 0.9rem;">Upload a new profile picture</p>
        </div>

        <!-- Form Container -->
        <div class="card" style="padding: 2rem;">
            <!-- ADD enctype="multipart/form-data" to form -->
            <form method="POST" action="{{ route('profile.updateImage') }}" enctype="multipart/form-data">
                @csrf

                <!-- Image Upload Field -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; color: #a0d5f1; font-weight: 500;">
                        <i class="fas fa-image" style="margin-right: 0.5rem;"></i>Select Image
                    </label>

                    <!-- Custom File Input -->
                    <div style="position: relative; margin-bottom: 0.5rem;">
                        <input type="file" id="image-upload" name="profile_image" accept="image/*" style="display: none;"
                            onchange="previewImage(event)">

                        <label for="image-upload" style="display: block; padding: 1rem; background: rgba(40, 40, 40, 0.8); 
                                          border: 2px dashed rgba(75, 171, 235, 0.5); border-radius: 8px; 
                                          text-align: center; color: #a0d5f1; cursor: pointer; 
                                          transition: all 0.3s ease;">
                            <i class="fas fa-cloud-upload-alt" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                            <div>Click to select image</div>
                            <div style="font-size: 0.85rem; color: #888; margin-top: 0.25rem;">
                                JPG, PNG, GIF
                            </div>
                        </label>
                    </div>

                    <!-- Selected File Name -->
                    <div id="file-name" style="color: #71b6e3; font-size: 0.9rem; margin-top: 0.5rem; display: none;">
                        <i class="fas fa-file-image"></i> <span id="selected-file">No file selected</span>
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

    <!-- JavaScript for Image Preview -->
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('image-preview');
            const fileNameDisplay = document.getElementById('selected-file');
            const fileContainer = document.getElementById('file-name');

            if (input.files && input.files[0]) {
                const file = input.files[0];
                const reader = new FileReader();

                // Show file name
                fileNameDisplay.textContent = file.name;
                fileContainer.style.display = 'block';

                // Preview image
                reader.onload = function (e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(file);
            }
        }

        // Drag and drop support
        document.addEventListener('DOMContentLoaded', function () {
            const dropArea = document.querySelector('label[for="image-upload"]');

            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                dropArea.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, unhighlight, false);
            });

            function highlight() {
                dropArea.style.borderColor = '#4babeb';
                dropArea.style.background = 'rgba(75, 171, 235, 0.1)';
            }

            function unhighlight() {
                dropArea.style.borderColor = 'rgba(75, 171, 235, 0.5)';
                dropArea.style.background = 'rgba(40, 40, 40, 0.8)';
            }

            dropArea.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                const input = document.getElementById('image-upload');

                input.files = files;
                previewImage({ target: input });
            }
        });
    </script>

    <!-- CSS for hover effects -->
    <style>
        label[for="image-upload"]:hover {
            border-color: #4babeb !important;
            background: rgba(75, 171, 235, 0.1) !important;
        }
    </style>
@endsection