<?php

    namespace App\Providers;

    use App\Models\ShortLink;
    use App\Observers\ShortLinkObserver;
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
            if ($this->app->environment('local')) {
                $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
                $this->app->register(TelescopeServiceProvider::class);
            }
        }

        /**
         * Bootstrap any application services.
         *
         * @return void
         */
        public function boot()
        {
            ShortLink::observe(ShortLinkObserver::class);
        }
    }