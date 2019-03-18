<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\PjeExecution;
use app\models\PjeExecutionStep;
use yii\data\ActiveDataProvider;

class StatsController extends BaseController
{
    public function actionIndex()
    {
        $listData = $this->executionsListData();
        $id = Yii::$app->request->get('id');
        $tableData = [];
        $execution = false;
        if ($id) {
            $tableData = $this->tableData($id);
            $execution = PjeExecution::find()->where(['id' => $id])->one();
        }
        return $this->render('index', [
            'listData' => $listData,
            'tableData' => $tableData,
            'id' => $id,
            'execution' => $execution
        ]);
    }
    
    private function executionsListData()
    {
        $executions = PjeExecution::find()->where('end_time is not null')
                                          ->orderBy('start_time desc')
                                          ->limit(20)
                                          ->all();
        $listData = [];
        $listData[''] = '-- select job execution --';
        foreach ($executions as $execution) {
            $listData[$execution->id] = $execution->job->title . ":({$execution->start_time})";
        }
        return $listData;
    }
    private function tableData($id)
    {
        $query = PjeExecutionStep::find()->where(['execution_id' => $id]);
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 100
            ],
            'sort' => [
                'defaultOrder' => [
                    'start_time' => SORT_ASC
                ]
            ],
        ]);
        return $provider;
    }
}
