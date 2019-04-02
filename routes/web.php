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
use Illuminate\Support\Facades\Cookie;

Route::get('/', function () {
    // // 设置cookie。Cookie::queue('user',$checkLogin, 30);因为这样Cookie会自动添加到响应
    // $cookie = Cookie::make('tian', 'lwj'); // 参数格式：$name, $value, $minutes。给下面服务
    // return response('Hello Cookie')->cookie($cookie);
    // return response('Hello Cookie')->cookie('test', '123', 600);
    // $value = response('Hello Cookie')->withCookie('key', 'value', 60); // 两种方式均可，第一种方式其实就是调用了第二种方式, 推荐还是使用第一种方式
    // // 获取cookie
    // // 通过调用 Illuminate\Http\Request 实例对象的 cookie 方法获取 或者 request() 函数
    // $value = $request->cookie('key');
    // echo request()->cookie('test');
    // // 通过 Cookie Facade 方式
    // echo Cookie::get('tian'); // 也是通过第一种方式调用的
    // // 删除 Cookie
    // $cookie = Cookie::forget('tian');
    // // 明文 Cookie
    // 在 /app/Http/Middleware/EncryptCookies.php 中的 $except 数组中将其加入，
    // protected $except = [
    //     'key'
    // ];
    // // 永不过期
    // Cookie::forever()

    // Redis::set('tian', 'tian');
    // dd(Redis::get('tian'));
    // Redis::set('tian', 'lwj');
    // dd(Redis::set('tian'));

    /**
     * 路径函数
     */
    // echo app_path();
    // echo '<br />';
    // echo base_path();
    // echo '<br />';
    // echo config_path();
    // echo '<br />';
    // echo database_path();
    // echo '<br />';
    // echo public_path();
    // echo '<br />';
    // echo storage_path();
    // echo '<br />';

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
    // // 设置
    // $id = 1;
    // $flag = Redis::set('user:profile:'.$id, 'lwj'); // object(Predis\Response\Status)#644 (1) { ["payload":"Predis\Response\Status":private]=> string(2) "OK" }
    // // 读取
    // $user = Redis::get('user:profile:'.$id); // string(3) "lwj"
    // // 递增
    // Redis::incr('lwj');
    // // dd(Redis::get('lwj')); // 1, 未定义key, 默认给key赋值为0
    // // 递减
    // Redis::decr('lwj1');
    // // dd(Redis::get('lwj1')); // -1
    // // 指定step递增
    // Redis::incrby('lwj', 6);
    // // dd(Redis::get('lwj'));
    // // 指定step递减
    // Redis::decrby('lwj1', 5);
    // // dd(Redis::get('lwj1'));

    // 2. 列表
    // // 在列表头插入
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
    // // 栈 -> 先进后出
    // // 左边开始压入元素
    // Redis::lpush("list1", 'one');
    // Redis::lpush("list1", 'two');
    // Redis::lpush("list1", 'three');
    // dump(Redis::lrange('list1', 0, -1));
    // // 队列 ->先进先出
    // Redis::rpush('rlist', 'one');
    // Redis::rpush('rlist', 'two');
    // Redis::rpush('rlist', 'three');
    // dump(Redis::lrange("rlist", 0, -1));
    // // 弹出队列和栈的元素
    // Redis::lpop("list1");
    // dd(Redis::lrange("list1", 0, -1));

    // 3. 哈希
    // // 单个设置
    // Redis::hset('tianwangchong', 'name', 'hello');
    // Redis::hset('tianwangchong', 'age', 18);
    // // dd(Redis::hgetall('tianwangchong'));
    // // 多个属性设置
    // Redis::hmset('happy:lishui', ['name' => "丽水"]);
    // Redis::hmset("fail:xiaoshou", [
    //     "lover" => "黑嘿嘿",
    //     'nice' => "我是xiaoshou",
    //     '挑衅' => '来打我啊'
    // ]);
    // dd(Redis::hgetall("happy:huizhou"));
    // dd(Redis::hgetall('fail:xiaoshou'));

    // 4. 集合(无序集合)
    // // 添加集合元素
    // Redis::sAdd('huizhou',['小东','小追命','小龙女']);
    // Redis::sAdd('xiaoshou',['小明','小追命','阳光宅猫']);
    // // dump(Redis::smembers('huizhou'));
    // // dd(Redis::smembers('xiaoshou'));
    // // 获取并集
    // dd(Redis::sunion('huizhou','xiaoshou'));
    // // 获取交集
    // dd(Redis::sinter("xiaoshou",'huizhou'));
    // // 获取huizhou与xiaoshou的差集
    // dd(Redis::sdiff("xiaoshou",'huizhou'));
    // // 获取xiaoshou与huizhou的差集
    // dd(Redis::sdiff('huizhou',"xiaoshou"));

    // 5. 有序集合
    // Redis::zadd("zlist", 1, "小明");
    // Redis::zadd("zlist", 3, "惠州");
    // Redis::zadd("zlist", 2, "加藤杰");
    // dump(Redis::zrange("zlist", 0, -1));
    // dump(Redis::zrevrange("zlist", 0, -1));

    // 6. 其他
    // 清空Redis数据库
    // Redis::flushall();

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
