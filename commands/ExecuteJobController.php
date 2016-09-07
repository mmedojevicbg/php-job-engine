<?php
namespace app\commands;
use yii\console\Controller;
use Yii;
use app\models\PjeExecution;
use app\models\PjeExecutionStep;
use app\models\PjeJobStep;
use app\models\PjeNotification;

class ExecuteJobController extends Controller
{
    public function actionIndex($jobId)
    {
        $executionId = $this->insertExecution($jobId);
        $jobSteps = $this->getJobSteps($jobId);
        $jobStartTime = date('Y-m-d H:i:s');
        $jobSuccess = 1;
        foreach($jobSteps as $jobStep) {
            $startTime = date('Y-m-d H:i:s');
            $basePath = Yii::$app->basePath;
            $output = shell_exec($basePath . DIRECTORY_SEPARATOR .  "yii execute-step {$jobStep->step->step_class} {$jobStep->id} {$jobStep->job->job_class} 2>&1");
            $endTime = date('Y-m-d H:i:s');
            $outputDecoded = json_decode($output, true);
            if(is_array($outputDecoded) && array_key_exists('success', $outputDecoded)) {
                $success = $outputDecoded['success'];
                $message = $outputDecoded['message'];   
            } else {
                $success = 0;
                if($output) {
                    $message = $output;
                } else {
                    $message = 'PHP Fatal Error (script interrupted)';
                }
            }
            $duration = strtotime($endTime) - strtotime($startTime);
            $this->insertExecutionStep($executionId, $jobStep->id, $startTime, $endTime, $duration, $success, $message);
            $jobSuccess = $jobSuccess * $success;
        }
        $jobEndTime = date('Y-m-d H:i:s');
        $jobDuration = strtotime($jobEndTime) - strtotime($jobStartTime);
        $execution = $this->completeExecution($executionId, $jobStartTime, $jobEndTime, $jobDuration, $jobSuccess);
        $this->generateNotification($execution);
    }
    
    protected function getJobSteps($jobId) {
        return PjeJobStep::find()->where(['job_id' => $jobId])->all();
    }
    
    protected function insertExecutionStep($executionId, $jobStepId, $startTime, $endTime, $duration, $success, $message) {
        $model = new PjeExecutionStep();
        $model->execution_id = $executionId;
        $model->job_step_id = $jobStepId;
        $model->start_time = $startTime;
        $model->end_time = $endTime;
        $model->duration = $duration;
        $model->success = $success;
        $model->response_message = $message;
        $model->save();
    }
    
    protected function insertExecution($jobId) {
        $model = new PjeExecution();
        $model->job_id = $jobId;
        $model->save();
        return $model->id;
    }
    protected function completeExecution($executionId, $startTime, $endTime, $duration, $success) {
        $model = PjeExecution::find()->where(['id' => $executionId])->one();
        $model->start_time = $startTime;
        $model->end_time = $endTime;
        $model->duration = $duration;
        $model->success = $success;
        $model->save();
        return $model;
    }
    protected function generateNotification($execution) {
        $notification = new PjeNotification();
        $notification->execution_id = $execution->id;
        $notification->notification_type = $execution->success ? PjeNotification::TYPE_SUCCESS : PjeNotification::TYPE_ERROR;
        $notification->notification_date = $execution->end_time;
        $notification->message = $execution->success ? 'Job completed' : 'Job failed';
        $notification->save();         
    }
}
