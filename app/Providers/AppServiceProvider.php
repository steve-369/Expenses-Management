<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use DutchCodingCompany\FilamentSocialite\Models\SocialiteUser;
use Laravel\Socialite\Contracts\User as UserContract;
use DutchCodingCompany\FilamentSocialite\Facades\FilamentSocialite;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
// Default

        
        FilamentSocialite::setCreateUserCallback(fn (UserContract $oauthUser, SocialiteUser $socialite) => $socialite->getUserModelClass()::create([
            'name' => $oauthUser->getName(),
            'email' => $oauthUser->getEmail(),
        ]));
    }
}
