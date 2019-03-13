<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PjeJobStep */

$this->title = 'Create Job Step';
$this->params['breadcrumbs'][] = ['label' => 'Job Steps', 'url' => '/job-step/index/' . $model->job_id];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pje-job-step-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
