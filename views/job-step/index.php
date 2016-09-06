<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PjeJobStepSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job steps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pje-job-step-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add step to job', '/job-step/create/' . $jobId, ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'job_id',
            'step_id',
            'title',

             [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {params}',
                'buttons' => [
                    'params' => function ($url, $model) {
                        $url = '/job-step-param/index/' . $model->id;
                        return Html::a('<span class="glyphicon glyphicon-list"></span>', $url, 
                        [
                            'title' => Yii::t('app', 'Params'),
                        ]);
                    }
                ]
            ],  
        ],
    ]); ?>
</div>
