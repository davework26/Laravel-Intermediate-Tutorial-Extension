<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Extend blade: https://laravel.com/docs/5.2/blade#extending-blade
        // e() is htmlentities helper.
        Blade::directive('datetime', function($expression) {
            /*
            return "<?php echo date_format($expression, 'l jS \of F Y h:i:s A'); ?>";
             * */
            
            return "<?php echo with{$expression}->format('m/d/Y H:i'); ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
