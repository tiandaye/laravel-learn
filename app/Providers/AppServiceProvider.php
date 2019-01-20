<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Log;
use Monolog\Handler\RedisHandler;
use Illuminate\Support\Facades\Redis;
use Predis;
use Laravel\Horizon\Horizon;
use Admin;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Horizon::auth(function ($request) {
            return true;
        });

        // laravel 5.4 改变了默认的数据库字符集，现在 utf8mb4 包括存储 emojis 支持。如果你运行MySQL v5.7.7或者更高版本，则不需要做任何事情。相当于之前3个字节来存，现在用4个字节来存。
        Schema::defaultStringLength(191);

        // $user = Redis::set('user:profile', 'lwj');
        // var_dump($user);
        // $user = Redis::get('user:profile');
        // var_dump($user);
        // die();
        // $redis = Redis::connection();
        // var_dump(get_class($redis));die();

        // // 将错误日志写到redis
        // $log = Log::getMonolog();
        // $client = new Predis\Client();
        // $redisHandler = new RedisHandler($client, 'error_log');
        // $log->pushHandler($redisHandler);
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
