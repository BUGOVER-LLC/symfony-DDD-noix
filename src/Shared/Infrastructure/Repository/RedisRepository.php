<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Repository;

use App\Shared\Application\Redis\RedisRepositoryInterface;
use Redis;

class RedisRepository implements RedisRepositoryInterface
{
    public function __construct(private readonly Redis $redis)
    {
        $this->redis->connect('127.0.0.1', 16379);
    }

    public function save()
    {
        $this->redis->set('test', 453453);
    }
}
