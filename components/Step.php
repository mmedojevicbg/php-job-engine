<?php
namespace app\components;

abstract class Step {
    protected $params = [];
    public function run() {
        try {
            if($this->shouldExecute()) {
                $output = $this->execute();
            } else {
                $output = self::generateResponse(1, 'Skipped');
            }
        } catch (\Exception $ex) {
            $output = self::generateResponse(0, $ex->getMessage());
        }
        return $output;
    }
    abstract protected function execute();
    public function rollBack() {}
    public function cleanUp() {}
    public function setParams($params) {
        $this->params = $params;
    } 
    public static function generateResponse($success, $message) {
        return [
            'success' => $success,
            'message' => $message
        ];
    }
    private function shouldExecute() {
        return true;
    }
}