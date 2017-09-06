<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PjeTest */

$this->title = 'Create Pje Test';
$this->params['breadcrumbs'][] = ['label' => 'Pje Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pje-test-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
