<?php

namespace app\common\Oxr;

use app\common\Oxr\Dto\Latest;

final class DtoMaker
{
    public function make(Method $method, string $rawData): Latest
    {
        //json_decode
        return match ($method) {
            Method::Latest => new Latest(),
        };
    }
}