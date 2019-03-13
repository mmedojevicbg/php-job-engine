<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PjeStep */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'step_class')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'is_active')->dropDownList([1 => 'Yes', 0 => 'No']) ?>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>  
    </div>
    <?php ActiveForm::end(); ?> 
</div>