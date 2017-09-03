<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PjeRecipientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recipients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pje-recipient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add recipient to job', '/recipient/create/' . $jobId, ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'email:email',
            'notify_on_success',
            'notify_on_failure',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
