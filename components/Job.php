<?php
namespace app\components;

class Job {
    public $additionalParams = [];
    
    public function __construct($additionalParams = false) {
        if($additionalParams) {
            $this->additionalParams = $additionalParams;
        }
    }
    
    public function params() {
        return [];
    }
}