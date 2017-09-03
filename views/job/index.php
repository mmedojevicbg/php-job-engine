<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PjeJobSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jobs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pje-job-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create job', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {steps} {recipients}',
                'buttons' => [
                    'steps' => function ($url, $model) {
                        $url = '/job-step/index/' . $model->id;
                        return Html::a('<span class="glyphicon glyphicon-list"></span>', $url, 
                        [
                            'title' => Yii::t('app', 'Steps'),
                        ]);
                    },
                    'recipients' => function ($url, $model) {
                        $url = '/recipient/index/' . $model->id;
                        return Html::a('<span class="glyphicon glyphicon-envelope"></span>', $url, 
                        [
                            'title' => Yii::t('app', 'Recipients'),
                        ]);
                    }
                ]
            ],  
        ],
    ]); ?>
</div>
