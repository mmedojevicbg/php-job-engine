<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PjeJob */

$this->title = 'Update Job: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pje-job-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
