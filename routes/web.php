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

Route::get('/', function () {
    /**
     * 写日志
     */
    Log::emergency("系统挂掉了");     //紧急状况，比如系统挂掉
    Log::alert("数据库访问异常");     //需要立即采取行动的问题，比如整站宕掉，数据库异常等，这种状况应该通过短信提醒
    Log::critical("系统出现未知错误");     //严重问题，比如：应用组件无效，意料之外的异常
    Log::error("指定变量不存在");     //运行时错误，不需要立即处理但需要被记录和监控
    Log::warning("该方法已经被废弃");    //警告但不是错误，比如使用了被废弃的API
    Log::notice("用户在异地登录");     //普通但值得注意的事件
    Log::info("用户xxx登录成功");     //感兴趣的事件，比如登录、退出
    Log::debug("调试信息");     //详细的调试信息

    // 访问底层Monolog的实例
    $monolog = Log::getMonolog();
    dd($monolog);

    /**
     * 抛异常
     */
    // // $a = 1 / 0;
    // throw new \Exception('tiandaye');
    // return view('welcome');
});

Route::get('/phpinfo', function () {
    echo phpinfo();
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
