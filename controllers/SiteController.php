<?php

namespace app\controllers;

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
        return $this->render('index',[
            'notifications' => $notifications
        ]);
    }
}
