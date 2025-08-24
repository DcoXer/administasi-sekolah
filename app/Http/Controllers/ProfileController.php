<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function updatePhoto(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'profile_photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $destination = storage_path('app/public/profile');
        if (!file_exists($destination)) mkdir($destination, 0777, true);

        // Hapus foto lama
        if ($user->profile_photo && file_exists($destination . '/' . $user->profile_photo)) {
            unlink($destination . '/' . $user->profile_photo);
        }

        // Simpan file baru
        $filename = uniqid('user_') . '.' . $request->file('profile_photo')->getClientOriginalExtension();
        $request->file('profile_photo')->move($destination, $filename);

        $user->profile_photo = $filename;
        $user->save();

        return redirect()->back()->with('success', '✅ Foto profile berhasil diperbarui!');
    }
}
