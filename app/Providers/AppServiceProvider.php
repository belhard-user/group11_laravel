<?php

namespace App\Providers;

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
        \Blade::directive('showTime', function ($val) {
            return "<?php echo date('d-m-Y H:i:s', $val) ?>";
        });
        
        view()->share('template', $this->getTemplate());
    }
    
    protected function getTemplate()
    {
        if (rand(0, 1)) {
            return 'main';
        }
        
        return 'main2';
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
