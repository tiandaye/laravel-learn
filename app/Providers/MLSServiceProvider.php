<?php

namespace App\Providers;

// 注意这里, 引入了我们的自定义 Class
use App\Custom\Classes\MLS;
use Illuminate\Support\ServiceProvider;

/**
 * 将自定义的 Facade 和自定义的 Class 绑定起来(自定义 Facade)
 *
 * Class MLSServiceProvider
 * @package App\Providers
 */
class MLSServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // 注意这里的 bind 写法，这是 Laravel 5.3 的正确写法；网上搜索到的很多资料都是不知何年何月的老版本的写法，如果你照抄就只会很郁闷。
        $this->app->bind('mls', function () {
            return new MLS();
        });

        // 看到 bind () 部分了吗？对应写的也是 “mls”，和自定义 Facade 中返回的一样。其实前后联系起来看就是，这个 “mls” 只是 Laravel 容器中的一个 “代号”，前面的 Facade 返回 “mls” 是告诉” 中介 “，也就是 我们自定义的 ServiceProvider：“如果有人虚要调用我时，请使用我的代号是 mls”，然后 ServiceProvider 在 register () 这里则告诉框架：“我介绍一个叫 MLS 的类入伙了，它的代号是 mls！“。这样，框架在你调用 Facade 时就会在自己的” 容器 “里找到代号为” mls“的自定义类给你，你才能使用这个自定义类里的方法。
    }
}
