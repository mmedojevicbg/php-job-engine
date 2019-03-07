<?php

namespace app\controllers;

use app\models\PjeExecution;
use app\models\PjeJobStep;
use Yii;
use yii\web\Controller;
use app\models\PjeNotification;
use app\models\PjeExecutionTest;

class SiteController extends BaseController
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }
    
    public function actionIndex()
    {
        $notifications = PjeNotification::find()->orderBy('id desc')->limit(25)->all();
        $longestSteps = PjeJobStep::getLongest(date('Y-m-d', strtotime('-7 days')), 5);
        $longestStepsData = [
            'titles' => array_map(function ($el) {
                return $el['title'];
            }, $longestSteps),
            'durations' => array_map(function ($el) {
                return $el['avg_duration'];
            }, $longestSteps)
        ];
        $longestStepsData = json_encode($longestStepsData);
        return $this->render('index', [
            'notifications' => $notifications,
            'longestStepsData' => $longestStepsData
        ]);
    }

    public function actionInProgress()
    {
        $sql = 'select 
                    e.id,
                    j.title as job_title, 
                    js.title as step_title, 
                    e.success job_success, 
                    es.success step_success 
                from pje_execution_step es
                inner join pje_job_step js on es.job_step_id = js.id
                inner join pje_execution e on e.id = es.execution_id
                inner join pje_job j on j.id = e.job_id
                where e.success is null
                order by e.id desc, js.order_num';
        $data = Yii::$app->getDb()->createCommand($sql)->queryAll();
        return $this->renderAjax('in-progress', [
            'data' => $data
        ]);
    }
}
