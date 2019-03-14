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
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $sql = 'select 
                    e.id,
                    j.title as job_title
                from pje_execution_step es
                inner join pje_job_step js on es.job_step_id = js.id
                inner join pje_execution e on e.id = es.execution_id
                inner join pje_job j on j.id = e.job_id
                where e.success is null
                group by e.id';
        $data = Yii::$app->getDb()->createCommand($sql)->queryAll();
        return $data;
    }
    
    public function actionTmp()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
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
        return $data;
    }
}
