<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PjeJob */

$this->title = 'Update Pje Job: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Pje Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pje-job-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
