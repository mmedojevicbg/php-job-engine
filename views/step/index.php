<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PjeStepSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Steps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pje-step-index">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
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
                        'step_class',
                        [
                            'attribute' => 'is_active',
                            'value' => function ($model) {
                                return $model->is_active == 1 ? 'Yes' : 'No';
                            }
                        ],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
              <div class="box-footer">
                  <?= Html::a('Scan', ['scan'], ['class' => 'btn btn-success']) ?>
              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</div>
