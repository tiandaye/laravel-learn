<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
    /**
     * 路径函数
     */
    echo app_path();
    echo '<br />';
    echo base_path();
    echo '<br />';
    echo config_path();
    echo '<br />';
    echo database_path();
    echo '<br />';
    echo public_path();
    echo '<br />';
    echo storage_path();
    echo '<br />';

    /**
     * Sentry的使用
     */
    // throw new \Exception('测试laravel-learn', 404);

    /**
     * redis的使用
     */
    // for($i = 2; $i <= 100000; $i++) {
    //     Redis::set('user:profile:'.$i, 'lwj');
    // }
    // 1. 字符串
    // $id = 1;
    // $flag = Redis::set('user:profile:'.$id, 'lwj'); // object(Predis\Response\Status)#644 (1) { ["payload":"Predis\Response\Status":private]=> string(2) "OK" }
    // $user = Redis::get('user:profile:'.$id); // string(3) "lwj"

    // 2. 列表
    // 在列表头插入
    // Redis::lpush('names', 'l');
    // Redis::lpush('names', 'w');
    // Redis::lpush('names', 'j');
    // Redis::lpush('names', 't');
    // Redis::lpush('names', 'i');
    // Redis::lpush('names', 'a');
    // Redis::lpush('names', 'n');
    // Redis::lpush('names', 'h');
    // Redis::lpush('names', 'e');
    // Redis::lpush('names', 'l');
    // Redis::lpush('names', 'l');
    // Redis::lpush('names', '0');
    // $values = Redis::lrange('names', 5, 10); // array(6) { [0]=> string(1) "n" [1]=> string(1) "a" [2]=> string(1) "i" [3]=> string(1) "t" [4]=> string(1) "j" [5]=> string(1) "w" }
    // var_dump($values);die();

    // 另外，你也可以通过 command 方法传递命令至服务器，它接收命令的名称作为第一个参数，第二个参数则为值的数组：
    // $values = Redis::command('lrange', ['name', 5, 10]);

    // 当你想要在单次操作中发送多个命令至服务器时则可以使用管道化命令。pipeline 方法接收一个参数：带有 Redis 实例的闭包。你可以发送所有的命令至此 Redis 实例，它们都会在单次操作中运行：
    // Redis::pipeline(function ($pipe) {
    //     for ($i = 0; $i < 1000; $i++) {
    //         $pipe->set("key:$i", $i);
    //     }
    // });

    /**
     * 写日志
     */
    // Log::emergency("系统挂掉了");     //紧急状况，比如系统挂掉
    // Log::alert("数据库访问异常");     //需要立即采取行动的问题，比如整站宕掉，数据库异常等，这种状况应该通过短信提醒
    // Log::critical("系统出现未知错误");     //严重问题，比如：应用组件无效，意料之外的异常
    // Log::error("指定变量不存在");     //运行时错误，不需要立即处理但需要被记录和监控
    // Log::warning("该方法已经被废弃");    //警告但不是错误，比如使用了被废弃的API
    // Log::notice("用户在异地登录");     //普通但值得注意的事件
    // Log::info("用户xxx登录成功");     //感兴趣的事件，比如登录、退出
    // Log::debug("调试信息");     //详细的调试信息
    //
    // // 访问底层Monolog的实例
    // $monolog = Log::getMonolog();
    // dd($monolog);

    /**
     * 抛异常
     */
    // // $a = 1 / 0;
    // throw new \Exception('tiandaye');

    /**
     * Clockwork使用
     */
    clock('log1', ['lwj' => 'thc']);

    clock()->info("User logged in!");

    clock()->startEvent('event_name', 'LaravelAcademy.org'); //事件名称，显示在Timeline中

    clock('Message text.'); //在Clockwork的log中显示'Message text.'
    logger('Message text.'); //也Clockwork的log中显示'Message text.'

    clock(array('hello' => 'world')); //以json方式在log中显示数组
    //如果对象实现了__toString()方法则在log中显示对应字符串，
    //如果对象实现了toArray方法则显示对应json格式数据，
    //如果都没有则将对象转化为数组并显示对应json格式数据
    // clock(new Object());

    clock()->endEvent('event_name');

    return view('welcome');
});

Route::get('/phpinfo', function () {
    echo phpinfo();
});

/**
 * 模拟队列
 */
Route::get('redisJob', ['uses' => 'RedisTestController@index']);
Route::get('redisJob/run', ['uses' => 'RedisTestController@runJob']);

/**
 * redis 发布与订阅
 */
Route::get('publish', function () {
    Redis::publish('test-channel', json_encode(['foo' => 'bar']));

    // 通配符订阅
    // 你可以使用 psubscribe 方法订阅一个通配符频道，这在对所有频道获取所有消息时相当有用。$channel 名称会被传递至该方法提供的回调闭包的第二个参数：
    // Redis::psubscribe(['*'], function($message, $channel) {
    //     echo $message;
    // });
    //
    // Redis::psubscribe(['users.*'], function($message, $channel) {
    //     echo $message;
    // });
});

/**
 * 引入默认的auth
 */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
