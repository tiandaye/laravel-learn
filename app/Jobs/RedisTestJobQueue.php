<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Log;
use Illuminate\Support\Facades\Redis;
// use Redis;

class RedisTestJobQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $redis_name;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($redis_name)
    {
        $this->redis_name = $redis_name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Redis $redis
        // $r = $redis::rPop($this->redis_name);

        $r = Redis::rPop($this->redis_name);

        $r ? Log::info('del: ' . $r . ' is ok') : Log::info('del: ' . $r . ' is fail');
    }
}
