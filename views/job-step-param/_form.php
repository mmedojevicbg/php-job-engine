<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PjeJobStepParam */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pje-job-step-param-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'job_step_id')->textInput() ?>

    <?= $form->field($model, 'param_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'param_value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
