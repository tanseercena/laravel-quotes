<?php

namespace Tanseercena\Quotes;

use Illuminate\Support\ServiceProvider;
use Tanseercena\Quotes\Commands\QuotesCommand;

class QuotesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      // $this->app->singleton(Quotes::class, function ($app) {
      //       return new Quotes();
      // });

      //Register Commands
      $this->app->singleton('command.tanseercena.quotes', function($app) {
            return new QuotesCommand();
      });
      $this->commands('command.tanseercena.quotes');

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
    * Get the services provided by the provider
    * @return array
    */
    public function provides()
    {
      return [
        // Quotes::class
        'command.tanseercena.quotes'
      ];
    }
}
