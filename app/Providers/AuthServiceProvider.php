<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        \App\Models\Raport::class => \App\Policies\RaportPolicy::class,
        \App\Models\NilaiSiswa::class => \App\Policies\NilaiPolicy::class,
        \App\Models\GuruBidang::class => \App\Policies\NilaiPolicy::class, // reuse NilaiPolicy for guru-bidang checks
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        // Role gates for convenience
        Gate::define('is-guru', fn($user) => $user->role === 'guru');
        Gate::define('is-wali', fn($user) => $user->role === 'wali_kelas');
        Gate::define('is-kepala', fn($user) => $user->role === 'kepala_sekolah');
        Gate::define('is-operator', fn($user) => $user->role === 'operator');
    }
}
