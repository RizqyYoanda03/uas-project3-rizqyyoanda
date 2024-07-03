<?php

namespace App\Providers;
use App\Models\User;
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
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('Admin', function (User $user) {
            return $user->role === 'Admin'; // sesuaikan dengan nilai yang sesuai untuk sistem
        });
    
        Gate::define('Manajer Stok', function (User $user) {
            return $user->role === 'Manajer Stok'; // sesuaikan dengan nilai yang sesuai untuk pembayaran
        });
    
        Gate::define('Pegawai', function (User $user) {
            return $user->role === 'Pegawai'; // sesuaikan dengan nilai yang sesuai untuk guru
        });
    
        Gate::define('Pelanggan', function (User $user) {
            return $user->role === 'Pelanggan'; // sesuaikan dengan nilai yang sesuai untuk siswa
        });
    }
}
