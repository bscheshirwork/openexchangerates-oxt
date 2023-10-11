<?php

namespace app\common\Oxr;

use app\common\Oxr\Dto\Latest;

final class Service
{
    public function __construct(private readonly Driver $driver)
    {
    }

    public function getLatest(): Latest
    {
        return $this->driver->getLatest();
    }
}