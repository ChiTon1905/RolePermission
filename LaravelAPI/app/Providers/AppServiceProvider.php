<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(125);
        //MySQL 8.0.31 chi cho phep defaultStringLength(125) la 1000 ky tu
        //Ma Laravel defaultStringLength(191)
        //Cho nen loi
        //Co the sai MariaDB de khac phuc dc van de nay
        //Hoac chinh ve defaultStringLength(125)
    }
}
