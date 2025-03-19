<?php

namespace App\Providers;

use App\Models\Message;
use App\Models\Project;
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
            'paragraph' => '',
            'logo' => '',
            'facebook_link' => '',
            'twitter_link' => '',
        ]);
        $productssss = Project::all();
    
        view()->share([
            'count' => $count,
            'settings' => $settings,
            'productssss' => $productssss,
        ]);
    }
}
