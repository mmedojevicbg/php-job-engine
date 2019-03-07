<?php
use yii\helpers\Html;

?>
<?= Html::beginForm('/auth/login', 'post', ['class' => 'form-signin']) ?>
    <img class="mb-4" src="/images/atomium_logo_i_2.png" alt="" width="110" height="100" style="margin-bottom: 30px; "/>
    <?= Html::errorSummary($model) ?>
    <?= Html::activeTextInput($model, 'username', ['class' => 'form-control', 'placeholder' => 'Username']) ?>
    <?= Html::activePasswordInput($model, 'password', ['class' => 'form-control', 'placeholder' => 'Password']) ?>
    <?= Html::submitButton('Sign in', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
<?= Html::endForm() ?>