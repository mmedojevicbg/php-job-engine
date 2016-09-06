<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PjeJobStepParam */

$this->title = 'Create Pje Job Step Param';
$this->params['breadcrumbs'][] = ['label' => 'Pje Job Step Params', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pje-job-step-param-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
