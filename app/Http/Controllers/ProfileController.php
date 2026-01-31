<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function show()
    {
        $user = User::find(Session::get("user_id"));
        return view("profile.show", compact("user"));
    }

    public function showEdit()
    {
        $user = User::find(Session::get("user_id"));
        return view("profile.showEdit", compact("user"));
    }

    public function showImage()
    {
        $user = User::find(Session::get("user_id"));
        return view("profile.showProfileImage", compact("user"));
    }
    public function update(Request $request)
    {
        $user = User::find(Session::get("user_id"));

        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "confirmed",
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully');
    }

    public function updateImage(Request $request)
    {
        $user = User::find(Session::get("user_id"));

        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $directory = public_path('images/profile_images');
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }

            // Generate unique filename
            $filename = 'profile_' . $user->id . '_' . time() . '.' . $request->file('profile_image')->getClientOriginalExtension();

            // Move uploaded file
            $request->file('profile_image')->move($directory, $filename);

            // Update user record with relative path
            $user->profile_location = 'images/profile_images/' . $filename;
            $user->save();

            return back()->with('success', 'Profile image updated successfully!');
        }

        return back()->with('error', 'No image uploaded.');
    }
}
