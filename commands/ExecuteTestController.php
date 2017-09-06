<?php
namespace app\commands;
use yii\console\Controller;
use Yii;
use app\models\PjeTest;
use app\models\PjeExecutionTest;

class ExecuteTestController extends Controller
{
    public function actionIndex()
    {
        $this->loadComponents();
        $tests = PjeTest::find()->where(['is_active' => PjeTest::ACTIVE])->all();
        if(count($tests)) {
            $testTime = date('Y-m-d H:i:s');
            foreach($tests as $test) {
                require_once Yii::$app->params['tests_path'] . DIRECTORY_SEPARATOR . $test->test_class . '.php';
                $testClass = '\\app\\components\\' . $test->test_class; 
                $testObj = new $testClass();
                $response = $testObj->run();
                $execution = new PjeExecutionTest();
                $execution->test_id = $test->id;
                $execution->test_time = $testTime;
                $execution->response = $response['response'];
                $execution->status = $response['status'];
                $execution->save();
            } 
        }
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
