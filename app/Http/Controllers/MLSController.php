<?php
/**
 * Created by PhpStorm.
 * User: tianwangchong
 * Date: 2019-08-21
 * Time: 11:11
 */

namespace App\Http\Controllers;

// 这里就是在 aliases 添加的别名了，如果别名换了，也请记得更新这里。
use MLS;
use Illuminate\Http\Request;

class MLSController extends Controller
{
    public function foo()
    {
        // 现在，我们就可以像使用静态类一样使用我们的自定义 Facade 了。
        echo MLS::test();

        // // 其实，关于 Facade 的争论很大，反对它的人认为它不过是一个针对 Class 的语法糖和快捷方式，甚至认为它最大的意义不过是让程序员不用敲一堆代码才能引用一个 Class，也就是如下的区别：
        // echo \App\Custom\Classes\MLS::test(); // 方式1, 直接会报错, 因为没有静态方法
        // echo MLS::test(); // 方式2

        // 但我个人觉得，哪怕是这种” 快捷方式 “的设计，在很多时候也会让我们的程序更具灵活性，比如 ”别名“ 的设定就可以让我们随时用一个具有相同方法但底层逻辑完成不同的 Class 去替换现有的，而保持代码的修改量最小。
    }
}