<?php
// provider for mbezhanov faker
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Bezhanov\Faker\ProviderCollectionHelper;
use Faker\Factory;
use Faker\Generator;

class FakerServiceProvider extends ServiceProvider

{
    // /**
    //  * Register services.
    //  *
    //  * @return void
    //  */
    public function register()
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            ProviderCollectionHelper::addAllProvidersTo($faker);

            return $faker;
        });
    }

    // /**
    //  * Bootstrap services.
    //  *
    //  * @return void
    //  */
    // public function boot()
    // {
    //     //
    // }


    
}

