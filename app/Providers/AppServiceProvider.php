<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Mail\EmailVerification;
use Illuminate\Auth\Notifications\VerifyEmail;
use Carbon\Carbon;

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
        // Yang baru
        // Override the email notification for verifying email
        VerifyEmail::toMailUsing(function ($notifiable) {

            return new EmailVerification($notifiable);
        });
        setlocale(LC_TIME, 'id_ID');
        config(['app.locale' => 'id']);
        \Carbon\Carbon::setLocale('id');

    }
}
