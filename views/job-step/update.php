<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PjeJobStep */

$this->title = 'Update Job Step: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Job Steps', 'url' => '/job-step/index/' . $model->job_id];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pje-job-step-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
