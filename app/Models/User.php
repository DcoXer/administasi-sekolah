<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
<<<<<<< HEAD
        'profile_photo',
=======
>>>>>>> 7881684e027466948b9fc35eb8f243bc2c31e810
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

<<<<<<< HEAD
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // Wali Kelas relationship
    public function kelasWali(){
        return $this->hasMany(Kelas::class, 'wali_kelas_id');
    }

    // Guru Bidang Studi relationship
    public function mapels(){
        return $this->hasMany(Mapel::class, 'guru_id');
    }

    // Guru Input Nilai relationship
    public function nilaiPTS(){
        return $this->hasMany(NilaiPTS::class, 'guru_id');
    }

    // Wali Kelas Raport relationship
    public function raportPTS(){
        return $this->hasMany(RaportPTS::class, 'wali_kelas_id');  
    }

    // Helper untuk mengecek role user
    public function hasRole($roleName)
    {
        return $this->roles()->where('name', $roleName)->exists();
=======
    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the Guru record associated with this User.
     * Attempts matching by NIP (email) or name.
     */
    public function getGuruRecord()
    {
        return Guru::where('nip', $this->email)->orWhere('nama', $this->name)->first();
>>>>>>> 7881684e027466948b9fc35eb8f243bc2c31e810
    }
}
