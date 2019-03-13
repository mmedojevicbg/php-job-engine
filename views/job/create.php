<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PjeJob */

$this->title = 'Create Job';
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pje-job-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
