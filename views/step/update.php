<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PjeStep */

$this->title = 'Update Step: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'steps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pje-step-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
