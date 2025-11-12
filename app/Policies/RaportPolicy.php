<?php

namespace App\Policies;

use App\Models\Raport;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RaportPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Wali kelas, kepala_sekolah and operator can view lists
        return in_array($user->role, ['wali_kelas', 'guru', 'kepala_sekolah', 'operator']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Raport $raport): bool
    {
        // Wali kelas of the student or kepala_sekolah or operator can view
        if (in_array($user->role, ['kepala_sekolah', 'operator'])) return true;

        if ($user->role === 'guru' || $user->role === 'wali_kelas') {
            $guru = \App\Models\Guru::where('nip', $user->email)->orWhere('nama', $user->name)->first();
            if (!$guru) return false;
            // Wali kelas - check wali_kelas_id
            if ($raport->wali_kelas_id && $raport->wali_kelas_id == $guru->id) return true;

            // Also allow if guru teaches some subjects in same class (basic check)
            return $raport->siswa->kelas === ($guru->jabatan ?? $guru->kelas ?? $raport->siswa->kelas);
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Only wali_kelas or kepala_sekolah can create raports
        return in_array($user->role, ['wali_kelas', 'kepala_sekolah']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Raport $raport): bool
    {
        // Wali kelas can update their raports; kepala and operator can too
        if (in_array($user->role, ['kepala_sekolah', 'operator'])) return true;
        if ($user->role === 'wali_kelas') {
            $guru = \App\Models\Guru::where('nip', $user->email)->orWhere('nama', $user->name)->first();
            if (!$guru) return false;
            return $raport->wali_kelas_id == $guru->id;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Raport $raport): bool
    {
        // Only kepala_sekolah or operator
        return in_array($user->role, ['kepala_sekolah', 'operator']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Raport $raport): bool
    {
        return in_array($user->role, ['kepala_sekolah', 'operator']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Raport $raport): bool
    {
        return in_array($user->role, ['kepala_sekolah', 'operator']);
    }
}
