<?php
namespace app\components;

abstract class Step {
    protected $params = [];
    public function run() {
        try {
            return $this->execute();
        } catch (\Exception $ex) {
            return self::generateResponse(0, $ex->getMessage());
        }
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
}