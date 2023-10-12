<?php

namespace app\common\Oxr;

use app\common\Oxr\Dto\Latest;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

final class Driver
{
    public function __construct(
        private readonly DtoMaker $dtoMaker = new DtoMaker(),
        private readonly Client   $client = new Client(),
    )
    {
    }

    private function get(Method $method, array $query = []): Latest
    {
        $endpoint = match ($method) {
            Method::Latest => 'latest.json',
        };

        $res = $this->client->request('GET', $endpoint, [
            RequestOptions::QUERY => [...$query, ...['app_id' => getenv('OXR_APP_ID')]],
            RequestOptions::TIMEOUT => 30,
            RequestOptions::HEADERS => [
                'Content-Type' => 'application/json',
            ],
        ]);
        if ($res->getStatusCode() !== 200) {
            //todo throw connection error
        }
        $rawResult = $res->getBody();

        return $this->dtoMaker->make($method, $rawResult->getContents());
    }

    public function getLatest(): Latest
    {
        return $this->get(Method::Latest);
    }
}