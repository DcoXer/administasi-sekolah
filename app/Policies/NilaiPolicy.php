<?php

namespace App\Policies;

use App\Models\NilaiSiswa;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NilaiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Allow guru_bidang, kepala_madrasah and operator
        return $user->hasAnyRole(['guru_bidang', 'kepala_madrasah', 'operator']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, NilaiSiswa $nilaiSiswa): bool
    {
        // Guru who teaches this subject or kepala_sekolah can view
        if ($user->hasAnyRole(['kepala_madrasah', 'operator'])) return true;

        if ($user->hasRole('guru_bidang')) {
            // match guru by name or NIP (simple heuristic)
            $guru = \App\Models\Guru::where('nip', $user->email)->orWhere('nama', $user->name)->first();
            if (!$guru) return false;
            return $nilaiSiswa->guruBidang->guru_id === $guru->id;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Only guru_bidang can create grades
        return $user->hasRole('guru_bidang');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, NilaiSiswa $nilaiSiswa): bool
    {
        if ($user->role === 'kepala_sekolah' || $user->role === 'operator') return true;

        if ($user->role === 'guru') {
            $guru = \App\Models\Guru::where('nip', $user->email)->orWhere('nama', $user->name)->first();
            if (!$guru) return false;
            return $nilaiSiswa->guruBidang->guru_id === $guru->id;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, NilaiSiswa $nilaiSiswa): bool
    {
        // Allow kepala_madrasah or operator only
        return $user->hasAnyRole(['kepala_madrasah', 'operator']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, NilaiSiswa $nilaiSiswa): bool
    {
        return in_array($user->role, ['kepala_sekolah', 'operator']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, NilaiSiswa $nilaiSiswa): bool
    {
        return in_array($user->role, ['kepala_sekolah', 'operator']);
    }
}
