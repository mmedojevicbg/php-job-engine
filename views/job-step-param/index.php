<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PjeStepParamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pje Job Step Params';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pje-job-step-param-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add param to step', '/job-step-param/create/' . $jobStepId, ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'job_step_id',
            'param_name',
            'param_value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
