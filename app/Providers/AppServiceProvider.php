<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        // Setting default string length.
        Schema::defaultStringLength(191);

        /**
        *
        *   Custom directive for blade views.
        *
        */
        Blade::directive('moviename', function($id){
            return "<?php echo getMovieName($id); ?>";
        });

        Blade::directive('branchname', function($id){
            return "<?php echo getBranchName($id); ?>";
        });

        Blade::directive('studioname', function($id){
            return "<?php echo getStudioName($id); ?>";
        });

        Blade::directive('imageurl', function($id){
            return "<?php echo getImageUrl($id); ?>";
        });

        Blade::directive('convertdate', function($date){
            return "<?php echo convertDateToTime($date); ?>";
        });
    }
}
