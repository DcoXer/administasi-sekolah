<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdateProfile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $photo;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function save()
    {
        $user = Auth::user();

        $this->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ✅ Simpan foto jika ada
        if ($this->photo) {
            if ($user->profile_photo && Storage::exists('public/profile/' . $user->profile_photo)) {
                Storage::delete('public/profile/' . $user->profile_photo);
            }

            $filename = uniqid('user_') . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('public/profile', $filename);
            $user->profile_photo = $filename;
        }

        $user->name  = $this->name;
        $user->email = $this->email;
        $user->save();

        session()->flash('success', '✅ Profil berhasil diperbarui!');
    }

    public function render()
    {
        return view('livewire.profile.update-profile');
    }
}
