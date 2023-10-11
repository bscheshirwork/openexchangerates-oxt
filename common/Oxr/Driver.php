<?php

namespace app\common\Oxr;

use app\common\Oxr\Dto\Latest;

final class Driver
{
    public function __construct(private readonly DtoMaker $dtoMaker = new DtoMaker())
    {
    }

    private function get(Method $method): Latest
    {
        $rawResult = 'raw';
        return $this->dtoMaker->make($method, $rawResult);
    }

    public function getLatest(): Latest
    {
        return $this->get(Method::Latest);
    }
}