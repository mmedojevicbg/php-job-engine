<?php

namespace app\controllers;

use app\models\PjeExecution;
use app\models\PjeJobStep;
use Yii;
use yii\web\Controller;
use app\models\PjeNotification;
use app\models\PjeExecutionTest;
use app\models\PjeJob;
use yii\data\ActiveDataProvider;
use app\helpers\FormatHelper;

class InProgressController extends BaseController
{
    public function actionJobs()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $sql = 'select 
                    e.id,
                    j.title as job_title,
                    j.id as job_id
                from pje_execution_step es
                inner join pje_job_step js on es.job_step_id = js.id
                inner join pje_execution e on e.id = es.execution_id
                inner join pje_job j on j.id = e.job_id
                where e.success is null
                group by e.id';
        $data = Yii::$app->getDb()->createCommand($sql)->queryAll();
        return $data;
    }
    
    public function actionSteps()
    {
        $job = Yii::$app->getRequest()->post('job');
        $execution = Yii::$app->getRequest()->post('execution');
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $sql = "select
                    j.title as job_title, 
                    js.title as step_title, 
                    e.success as job_success, 
                    es.success as step_success,
                    if(es.execution_id is null, 0, 1) as executing
                from pje_job_step js
                inner join pje_job j on j.id = js.job_id
                left join pje_execution_step es on js.id = es.job_step_id and es.execution_id = {$execution}
                left join pje_execution e on e.id = es.execution_id
                where js.job_id = {$job}
                order by js.order_num;";
        $data = Yii::$app->getDb()->createCommand($sql)->queryAll();
        return $data;
    }
}
