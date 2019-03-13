<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PjeJobStepParam */

$this->title = 'Update Param: ' . $model->param_name;
$this->params['breadcrumbs'][] = ['label' => 'Params', 'url' => ['index', 'id' => $model->job_step_id]];
$this->params['breadcrumbs'][] = ['label' => $model->param_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pje-job-step-param-update">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
