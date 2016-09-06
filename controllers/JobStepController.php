<?php

namespace app\controllers;

use Yii;
use app\models\PjeJobStep;
use app\models\PjeJobStepSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JobStepController implements the CRUD actions for PjeJobStep model.
 */
class JobStepController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PjeJobStep models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new PjeJobStepSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'jobId' => $id
        ]);
    }

    /**
     * Displays a single PjeJobStep model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PjeJobStep model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new PjeJobStep();
        $model->job_id = $id;
        if ($model->load(Yii::$app->request->post())) {
            $lastStep = PjeJobStep::find()->where(['job_id' => $id])->orderBy('order_num DESC')->one();
            $orderNum = 1; 
            if($lastStep) {
                $orderNum = $lastStep->order_num + 1;
            }
            $model->order_num = $orderNum;
            if($model->save()) {
                return $this->redirect('/job-step/index/' . $id);
            } else {
                return $this->render('create', [
                    'model' => $model
                ]);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    /**
     * Updates an existing PjeJobStep model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('/job-step/index/' . $model->job_id);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PjeJobStep model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $jobId = $model->job_id;
        $model->delete();
        return $this->redirect('/job-step/index/' . $jobId);
    }

    /**
     * Finds the PjeJobStep model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PjeJobStep the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PjeJobStep::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
