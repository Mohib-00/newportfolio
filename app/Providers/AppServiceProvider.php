<?php

namespace App\Providers;

use App\Models\Message;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $count = Message::whereHas('messageStatus', function ($query) {
            $query->where('status', 1);
        })->count();
        $settings = Setting::first() ?? new Setting([
            'name' => '',
            'email' => '',
            'address' => '',
            'phone' => '',
            'about_paragraph' => '',
            'image_1' => '',
        ]);
    
        view()->share([
            'count' => $count,
            'settings' => $settings,
        ]);
    }
}
