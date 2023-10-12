<?php

namespace app\commands;

use app\common\Oxr\Driver;
use app\common\Oxr\DtoMaker;
use app\common\Oxr\Service;
use GuzzleHttp\Client;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\VarDumper;

final class OxrController extends Controller
{
    public function actionIndex()
    {
        $service = new Service(
            new Driver(
                new DtoMaker(),
                new Client([
                    'base_uri' => getenv('OXR_BASE_URI')
                ]),
            ),
        );
        VarDumper::dump($service->getLatest());

        return ExitCode::OK;
    }

}