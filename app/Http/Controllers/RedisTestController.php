<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Jobs\RedisTestJobQueue;
use Illuminate\Support\Facades\Log;

class RedisTestController extends Controller
{
    public $redis_name = 'testredis';

    public function index()
    {
        // $r = Redis::rPop($this->redis_name);
        // $r ? Log::info('del: ' . $r . ' is ok') : Log::info('del: ' . $r . ' is fail');

        $r = Redis::rPush($this->redis_name, str_random());
        echo $r;
    }

    public function runJob()
    {
        $job = (new RedisTestJobQueue($this->redis_name));
        $this->dispatch($job);
    }
}
