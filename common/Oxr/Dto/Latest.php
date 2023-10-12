<?php

namespace app\common\Oxr\Dto;

use app\common\Oxr\Currency;
use SplObjectStorage;

final class Latest
{
    public function __construct(
        public readonly string $disclaimer,
        public readonly string $license,
        public readonly int $timestamp,
        public readonly Currency $base,
        public readonly SplObjectStorage $rates,
    )
    {
    }
}