<?php
namespace app\commands;
use Yii;
use yii\console\Controller;
use app\models\PjeJobStepParam;

class ExecuteStepController extends Controller
{
    public function actionIndex($stepClass, $jobStepId, $jobClass = false)
    {
        require_once Yii::$app->params['steps_path'] . DIRECTORY_SEPARATOR . $stepClass . '.php';
        $stepClass = '\\app\\components\\' . $stepClass; 
        $params = $this->params($jobStepId, $jobClass);
        $step = new $stepClass();
        $step->setParams($params);
        $response = $step->run();
        echo json_encode($response);
    }
    
    private function params($jobStepId, $jobClass) {
        if($jobClass) {
            require_once Yii::$app->params['jobs_path'] . DIRECTORY_SEPARATOR . $jobClass . '.php';
        } else {
            $jobClass = 'Job';
        }
        $jobClass = '\\app\\components\\' . $jobClass; 
        $params = [];
        if($jobClass) {
            $job = new $jobClass();
            $params = array_merge($params, $job->params());
        }
        $stepParams = PjeJobStepParam::find()->where(['job_step_id' => $jobStepId])->all();
        foreach($stepParams as $param) {
            $params[$param->param_name] = $param->param_value;
        }
        return $params;
    }
}
