<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PjeStep */

$this->title = 'Create Step';
$this->params['breadcrumbs'][] = ['label' => 'Steps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pje-step-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
