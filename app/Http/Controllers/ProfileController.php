<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        
        // Validasi inputan pengguna
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Menangani foto profil jika ada yang diunggah
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profiles', 'public');
            $data['profile_picture'] = $path;
        }

        // Update data pengguna termasuk jumlah feed per row
        $user->update($data);

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully!');
    }
}
