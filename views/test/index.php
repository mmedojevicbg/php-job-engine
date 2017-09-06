<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PjeTestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pje-test-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <h2>Command</h2>
    <div><code><?= Yii::$app->basePath . DIRECTORY_SEPARATOR . 'yii execute-test';?></code></div>
    <br />
    <p>
        <?= Html::a('Scan', ['scan'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'test_class',
            'is_active',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
