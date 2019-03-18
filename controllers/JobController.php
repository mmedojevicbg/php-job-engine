<?php

namespace app\controllers;

use Yii;
use app\models\PjeJob;
use app\models\PjeJobSearch;
use app\models\PjeExecution;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * JobController implements the CRUD actions for PjeJob model.
 */
class JobController extends BaseController
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
     * Lists all PjeJob models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PjeJobSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PjeJob model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $executionHistory = $this->getExecutionHistory($id);
        $chartData = [];
        foreach ($executionHistory->models as $e) {
            $chartData[] = [
                'title' => $e->start_time,
                'value' => $e->duration
            ];
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'executionHistory' => $executionHistory,
            'chartData' => $chartData
        ]);
    }
    
    private function getExecutionHistory($id)
    {
        $executionQuery = PjeExecution::find()->orderBy('end_time desc')->limit(10);
        $executionQuery->andWhere(['job_id' => $id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $executionQuery
        ]);
        return $dataProvider;
    }

    /**
     * Creates a new PjeJob model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PjeJob();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PjeJob model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PjeJob model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PjeJob model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PjeJob the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PjeJob::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
