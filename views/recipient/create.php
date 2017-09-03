<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PjeRecipient */

$this->title = 'Create Pje Recipient';
$this->params['breadcrumbs'][] = ['label' => 'Pje Recipients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pje-recipient-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
