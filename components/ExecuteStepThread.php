<?php
namespace app\components;

class ExecuteStepThread extends \Thread{
    private $command;
    private $stepId;
    private $startTime;
    public $response;
    public function __construct($command, $stepId, $startTime) {
        $this->command = $command;
        $this->stepId = $stepId;
        $this->startTime = $startTime;
    }
    function run(){
        $output = shell_exec($this->command);
        $endTime = date('Y-m-d H:i:s');
        $this->response = [
            'start_time' => $this->startTime,
            'end_time' => $endTime,
            'duration' => strtotime($endTime) - strtotime($this->startTime),
            'output' => $output,
            'step_id' => $this->stepId
        ];
    }
}