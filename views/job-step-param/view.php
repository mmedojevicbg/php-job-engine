<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PjeJobStepParam */

$this->title = $model->job_step_id;
$this->params['breadcrumbs'][] = ['label' => 'Pje Job Step Params', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pje-job-step-param-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->job_step_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->job_step_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'job_step_id',
            'param_name',
            'param_value',
        ],
    ]) ?>

</div>
