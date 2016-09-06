<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PjeStepParamSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pje-job-step-param-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <?= $form->field($model, 'id') ?>
    
    <?= $form->field($model, 'job_step_id') ?>

    <?= $form->field($model, 'param_name') ?>

    <?= $form->field($model, 'param_value') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
