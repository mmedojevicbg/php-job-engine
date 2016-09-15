<?php

namespace app\controllers;

use app\models\PjeJobStep;
use Yii;
use yii\web\Controller;
use app\models\PjeNotification;

class SiteController extends Controller
{
   
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }
    
    public function actionIndex()
    {
        $notifications = PjeNotification::find()->orderBy('id desc')->all();
        $longestSteps = PjeJobStep::getLongest(date('Y-m-d', strtotime('-7 days')), 5);
        $longestStepsData = [
            'titles' => array_column($longestSteps, 'title'),
            'durations' => array_column($longestSteps, 'avg_duration')
        ];
        $longestStepsData = json_encode($longestStepsData);
        return $this->render('index',[
            'notifications' => $notifications,
            'longestStepsData' => $longestStepsData
        ]);
    }
}
