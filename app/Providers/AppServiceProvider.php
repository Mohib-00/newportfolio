<?php

namespace App\Providers;

use App\Models\Message;
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
    
        view()->share([
            'count' => $count,
        ]);
    }
}
