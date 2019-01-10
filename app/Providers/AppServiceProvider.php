<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // laravel 5.4 改变了默认的数据库字符集，现在 utf8mb4 包括存储 emojis 支持。如果你运行MySQL v5.7.7或者更高版本，则不需要做任何事情。相当于之前3个字节来存，现在用4个字节来存。
        Schema::defaultStringLength(191);
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
