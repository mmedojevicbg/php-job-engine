<?php
namespace app\components;
use app\models\PjeExecutionTest;

abstract class Test {
    const STATUS_FAIL = 0;
    const STATUS_WARNING = 1;
    const STATUS_SUCCESS = 2;
    
    public function run() {
        try {
            $output = $this->execute();
        } catch (\Exception $ex) {
            $output = self::generateResponse(self::STATUS_FAIL, $ex->getMessage());
        }
        return $output;
    }
    abstract protected function execute();
    public static function generateResponse($status, $response) {
        $response = mb_strimwidth($response, 0, 100, '...');
        return [
            'status' => $status,
            'response' => $response
        ];
    }
}