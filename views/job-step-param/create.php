<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PjeJobStepParam */

$this->title = 'Create Param';
$this->params['breadcrumbs'][] = ['label' => 'Params', 'url' => ['index', 'id' => $model->job_step_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pje-job-step-param-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
