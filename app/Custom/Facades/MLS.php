<?php
/**
 * Created by PhpStorm.
 * User: tianwangchong
 * Date: 2019-08-21
 * Time: 10:48
 */

namespace App\Custom\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * 自定义 Facade(自定义 Facade)
 *
 * Class MLS
 * @package App\Custom\Facades
 */
class MLS extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'mls';
    }
}