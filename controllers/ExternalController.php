<?php

namespace app\controllers;

use Yii;
use app\models\PjeExecution;

class ExternalController extends BaseController
{
    public function actionIndex()
    {
        header("Content-Type: application/javascript");
        $callback = Yii::$app->request->get('callback');
        $count = PjeExecution::find()->where([
            'end_time' => null
        ])->count();
        $jsonResponse = json_encode(['count' => $count]);
        echo $callback . '(' . $jsonResponse . ')';
        exit;
    }
}
