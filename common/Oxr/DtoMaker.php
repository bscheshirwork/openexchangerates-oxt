<?php

namespace app\common\Oxr;

use app\common\Oxr\Dto\Latest;
use app\common\Oxr\Dto\Rate;
use SplObjectStorage;
use yii\helpers\Json;

final class DtoMaker
{
    public function make(Method $method, string $rawData): Latest
    {
        return match ($method) {
            Method::Latest => $this->makeLatest(Json::decode($rawData)),
        };
    }

    private function makeLatest(array $data): Latest
    {
        $exchangeRates = new SplObjectStorage();
        foreach ($data['rates'] ?? [] as $rateName => $rateValue) {
            $currency = Currency::from($rateName);
            $exchangeRates->attach($currency, new Rate($currency, $rateValue));
        }

        return new Latest(
            $data['disclaimer'],
            $data['license'],
            $data['timestamp'],
            Currency::from($data['base']),
            $exchangeRates,
        );
    }
}