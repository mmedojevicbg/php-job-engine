<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\LoginForm;

class AuthController extends Controller
{
    public function beforeAction($action)
    {
        $this->layout = 'login';
        return parent::beforeAction($action);
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->login();
            $this->redirect('/');
        }
        return $this->render('login', [
            'model' => $model
        ]);
    }
    
    public function actionLogout()
    {
        Yii::$app->user->logout();
        $this->redirect('/');
    }
}
