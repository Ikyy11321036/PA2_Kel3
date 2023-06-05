<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Validator::extend('password', 'Validator@validatePassword');

        Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
            // Pastikan password memiliki minimal 8 karakter
            if (strlen($value) < 8) {
                return false;
            }
    
            // Pastikan password memiliki setidaknya satu huruf kapital
            if (!preg_match('/[A-Z]/', $value)) {
                return false;
            }
    
            // Pastikan password memiliki setidaknya satu karakter khusus
            if (!preg_match('/[\W]+/', $value)) {
                return false;
            }
    
            return true;
        });
    }
}
