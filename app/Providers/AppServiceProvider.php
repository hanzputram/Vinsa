<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Carbon\Carbon;

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
    public function boot()
    {
        Carbon::setLocale(config('app.locale'));

        // Register a global helper function for product image URL
        Blade::directive('productImage', function ($expression) {
            return "<?php echo \App\Helpers\ProductHelper::imageUrl($expression); ?>";
        });
    }
}

