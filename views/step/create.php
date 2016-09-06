<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PjeStep */

$this->title = 'Create Pje Step';
$this->params['breadcrumbs'][] = ['label' => 'Pje Steps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pje-step-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
