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
        $job = Yii::$app->request->get('job-filter');
        $date = date('Y-m-d', strtotime('-2 months'));
        return $this->render('index', [
            'lastExecutionsProvider' => $this->getLastExecutionsProvider($job),
            'failedExecutionsProvider' => $this->getFailedExecutionsProvider($job),
            'completedCount' => PjeExecution::getCompletedCount($date, $job),
            'failedCount' => PjeExecution::getFailedCount($date, $job),
            'avgDuration' => FormatHelper::secondsToHMS(PjeExecution::getAvgDuration($date, $job)),
            'maxDuration' => FormatHelper::secondsToHMS(PjeExecution::getMaxDuration($date, $job)),
            'jobs' => PjeJob::find()->orderBy('title')->all(),
            'selectedJob' => $job
        ]);
    }
    private function getLastExecutionsProvider($job)
    {
        $executionQuery = PjeExecution::find()->orderBy('end_time desc')->limit(10);
        if ($job) {
            $executionQuery->andWhere(['job_id' => $job]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $executionQuery
        ]);
        $dataProvider->pagination = false;
        return $dataProvider;
    }
    private function getFailedExecutionsProvider($job)
    {
        $date = date('Y-m-d', strtotime('-7 days'));
        $executionQuery = PjeExecution::find()
                                ->where(['success' => 0])
                                ->andWhere(['>=', 'start_time', $date])
                                ->orderBy('end_time desc')
                                ->limit(10);
        if ($job) {
            $executionQuery->andWhere(['job_id' => $job]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $executionQuery
        ]);
        $dataProvider->pagination = false;
        return $dataProvider;
    }
}
