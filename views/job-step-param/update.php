<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PjeJobStepParam */

$this->title = 'Update Pje Job Step Param: ' . $model->param_name;
$this->params['breadcrumbs'][] = ['label' => 'Pje Job Step Params', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->param_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pje-job-step-param-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
