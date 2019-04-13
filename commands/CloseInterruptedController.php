<?php
namespace app\commands;

use yii\console\Controller;
use Yii;
use app\models\PjeExecution;
use app\models\PjeExecutionStep;
use app\models\PjeNotification;

class CloseInterruptedController extends Controller
{
    public function actionIndex()
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN') {
            $inProgress = PjeExecution::find()->where([
                'end_time' => null
            ])->all();
            foreach ($inProgress as $item) {
                if ($item->pid && file_exists("/proc/{$item->pid}")) {
                    $execution = PjeExecution::find()->where([
                        'id' => $item->id
                    ])->one();
                    if (!$execution->end_time) {
                        PjeExecutionStep::updateAll([
                            'start_time' => date('Y-m-d H:i:s'),
                            'end_time' => date('Y-m-d H:i:s'),
                            'duration' => 0,
                            'success' => 0,
                            'response_message' => 'Interrupted'
                        ], 'end_time is null');
                        $duration = PjeExecutionStep::find()
                                                    ->where(['execution_id' => $execution->id])
                                                    ->andWhere(['not', ['duration' => null]])
                                                    ->sum('duration');
                        $startTime = PjeExecutionStep::find()
                                                    ->where(['execution_id' => $execution->id])
                                                    ->andWhere(['not', ['start_time' => null]])
                                                    ->min('start_time');
                        $endTime = PjeExecutionStep::find()
                                                    ->where(['execution_id' => $execution->id])
                                                    ->andWhere(['not', ['end_time' => null]])
                                                    ->max('end_time');
                        $execution->duration = $duration;
                        $execution->success = 0;
                        $execution->start_time = $startTime;
                        $execution->end_time = $endTime;
                        $execution->save(false);
                    }
                }
            }
        }
    }
    
    protected function generateNotification($execution)
    {
        $notification = new PjeNotification();
        $notification->execution_id = $execution->id;
        $notification->notification_type = PjeNotification::TYPE_ERROR;
        $notification->notification_date = $execution->end_time;
        $notification->message = 'Job interrupted';
        $notification->save();
    }
}
