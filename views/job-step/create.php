<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PjeJobStep */

$this->title = 'Create Job Step';
$this->params['breadcrumbs'][] = ['label' => 'Job Steps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pje-job-step-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
