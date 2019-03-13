<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PjeJobSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manage Jobs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pje-job-index">

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <?= GridView::widget([
                    'tableOptions' => [
                        'class' => 'table table-striped table-bordered dataTable',
                    ],
                    'options' => [
                        'class' => 'table-responsive',
                    ],
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        'title',
                        'description:ntext',

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view} {update} {delete} {steps} {recipients}',
                            'buttons' => [
                                'steps' => function ($url, $model) {
                                    $url = '/job-step/index/' . $model->id;
                                    return Html::a(
                                        '<span class="fa fa-puzzle-piece"></span>',
                                        $url,
                                    [
                                        'title' => Yii::t('app', 'Steps'),
                                    ]
                                    );
                                },
                                'recipients' => function ($url, $model) {
                                    $url = '/recipient/index/' . $model->id;
                                    return Html::a(
                                        '<span class="glyphicon glyphicon-envelope"></span>',
                                        $url,
                                    [
                                        'title' => Yii::t('app', 'Recipients'),
                                    ]
                                    );
                                }
                            ]
                        ],
                    ],
                ]); ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</div>
