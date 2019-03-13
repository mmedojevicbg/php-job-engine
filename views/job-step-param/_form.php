<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PjeJobStepParam */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">
        <?= $form->field($model, 'job_step_id')->hiddenInput() ?>

        <?= $form->field($model, 'param_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'param_value')->textInput(['maxlength' => true]) ?>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?> 
</div>