<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PjeTest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pje-test-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'is_active')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
