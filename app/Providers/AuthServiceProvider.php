<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('isAdmin', function($pegawai){
            return $pegawai->pgw_jabatan == "Admin";
        });
         $gate->define('isCS', function($pegawai){
            return $pegawai->pgw_jabatan == "CS";
        });
         $gate->define('isKasir', function($pegawai){
            return $pegawai->pgw_jabatan == "Kasir";
        });
         $gate->define('isMontir', function($pegawai){
            return $pegawai->pgw_jabatan == "Montir";
        });
    }
}
