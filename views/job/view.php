<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\PjeJob */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">

<div class="col-md-6">
    <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Execution History</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
       <?= GridView::widget([
            'tableOptions' => [
                'class' => 'table table-striped table-bordered dataTable',
            ],
            'options' => [
                'class' => 'table-responsive',
            ],
            'dataProvider' => new yii\data\ArrayDataProvider([
                'allModels' => $executionHistory]),
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'start_time',
                'duration',
                [
                    'attribute' => 'success',
                    'format' => 'html',
                    'value' => function ($data) {
                        if ($data['success']) {
                            $imageUrl = '/images/success.png';
                        } else {
                            $imageUrl = '/images/error.png';
                        }
                        return Html::img(
                            $imageUrl,
                            ['width' => '24px']
                        );
                    },
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{details}',
                    'buttons' => [
                        'details' => function ($url, $model) {
                            $url = '/stats/index/' . $model['id'];
                            return Html::a(
                                '<span class="glyphicon glyphicon-list"></span>',
                                $url,
                            [
                                'title' => Yii::t('app', 'Details'),
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
</div>
    
<div class="col-md-6">
    <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Command</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class=fakeMenu>
            <div class="fakeButtons fakeClose"></div>
            <div class="fakeButtons fakeMinimize"></div>
            <div class="fakeButtons fakeZoom"></div>
        </div>
        <div class="fakeScreen">
          <p class="line1">$ <?= Yii::$app->basePath . DIRECTORY_SEPARATOR . 'yii execute-job ' , $model->id;?></p>
          <p class="line4">><span class="cursor4">_</span></p>
        </div>
    </div>
    <!-- /.box-body -->
    </div>
</div>
    
    
<div class="col-md-6">
    <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Chart</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
       <canvas id="job-chart" width="300" height="150"></canvas>
    </div>
    <!-- /.box-body -->
    </div>
</div>
    
</div>

<?php
$chartTitles = json_encode($chartData['title']);
$chartValues = json_encode($chartData['value']);
$js = <<<EOT
    var ctx = document.getElementById("job-chart");
    var jobChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {$chartTitles},
            datasets: [{
                label: '# of seconds',
                data: {$chartValues}
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
EOT;
$this->registerJs($js);
?>
