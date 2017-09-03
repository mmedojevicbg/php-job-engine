<?php
namespace app\commands;
use Yii;
use yii\console\Controller;
use app\models\PjeJobStepParam;

class ExecuteStepController extends Controller
{
    public $additional;
    
    public function options($actionID)
    {
        return ['additional'];
    }
    
    public function optionAliases()
    {
        return ['a' => 'additional'];
    }
    
    public function actionIndex($stepClass, $jobStepId, $jobClass = false)
    {
        require_once Yii::$app->params['steps_path'] . DIRECTORY_SEPARATOR . $stepClass . '.php';
        $stepClass = '\\app\\components\\' . $stepClass; 
        $params = $this->params($jobStepId, $jobClass);
        $step = new $stepClass();
        $step->setParams($params);
        $response = $step->run();
        ob_start();
        ob_end_clean();
        echo json_encode($response);
    }
    
    private function params($jobStepId, $jobClass) {
        $this->loadComponents();
        if($jobClass) {
            require_once Yii::$app->params['jobs_path'] . DIRECTORY_SEPARATOR . $jobClass . '.php';
        } else {
            $jobClass = 'Job';
        }
        $jobClass = '\\app\\components\\' . $jobClass; 
        $params = [];
        $additional = [];
        if($this->additional) {
            $additional = explode('~', $this->additional);
        }
        $job = new $jobClass($additional);
        $params = array_merge($params, $job->params());
        $stepParams = PjeJobStepParam::find()->where(['job_step_id' => $jobStepId])->all();
        foreach($stepParams as $param) {
            $params[$param->param_name] = $param->param_value;
        }
        return $params;
    }
    
    private function loadComponents() {
        if(array_key_exists('components_path', Yii::$app->params)) {
            $files = glob(Yii::$app->params['components_path'] . DIRECTORY_SEPARATOR . '*.php');
            foreach($files as $file) {
                require_once $file;
            }
        }
    }
}
