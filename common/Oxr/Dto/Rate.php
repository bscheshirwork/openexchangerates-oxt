<?php

namespace app\common\Oxr\Dto;

use app\common\Oxr\Currency;

final class Rate
{
    public function __construct(
        public readonly Currency $currency,
        public readonly float $value,
    )
    {
    }
}