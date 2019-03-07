<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        $loginAction = '/auth/login';
        $currentAction = '/' . $action->controller->id . '/' . $action->id;
        if ($currentAction != $loginAction) {
            if (!Yii::$app->user->identity) {
                $this->redirect($loginAction);
            }
        }
        return parent::beforeAction($action);
    }
}
