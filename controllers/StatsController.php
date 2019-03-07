<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\PjeExecution;
use app\models\PjeExecutionStep;

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
        $executions = PjeExecution::find()->where('end_time is not null')->orderBy('start_time desc')->all();
        $listData = [];
        $listData[''] = '-- select job execution --';
        foreach ($executions as $execution) {
            $listData[$execution->id] = $execution->job->title . ":({$execution->start_time})";
        }
        return $listData;
    }
    private function tableData($id)
    {
        $steps = PjeExecutionStep::find()->where(['execution_id' => $id])->orderBy('start_time asc')->all();
        $tableData = [];
        foreach ($steps as $step) {
            $tableData[] = [
                'step' => $step->jobStep->step->title,
                'start_time' => $step->start_time,
                'end_time' => $step->end_time,
                'duration' => $step->duration,
                'success' => $step->success ? 'YES' : 'NO',
                'response_message' => $step->response_message,
                'average_cpu_usage' => $step->average_cpu_usage
            ];
        }
        return $tableData;
    }
}
