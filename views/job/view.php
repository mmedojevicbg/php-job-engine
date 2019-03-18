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
                'class' => 'table table-striped',
            ],
            'options' => [
                'class' => 'table-responsive',
            ],
            'summary' => '',
            'dataProvider' => $executionHistory,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'header' => 'Job',
                    'value' => 'job.title',
                    'format' => 'raw',
                    'value'=>function ($model) {
                        return Html::a($model->job->title, '/stats/index/' . $model->id);
                    }
                ],
                [
                    'header' => 'Completed at',
                    'value' => 'end_time'
                ],
                [
                    'header' => 'Status',
                    'value' => function ($model) {
                        if ($model->success == 1) {
                            return '<div class="badge badge-status bg-light-blue">SUCCESS</div>';
                        } else {
                            return '<div class="badge badge-status bg-red">FAIL</div>';
                        }
                    },
                    'format' => 'raw'
                ]
            ]
            ])
        ?>   
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
        <div id="job-chart" style="width: 100%; height: 280px;"></div>
    </div>
    <!-- /.box-body -->
    </div>
</div>
    
</div>

<?php
$chartData = json_encode($chartData);
$js = <<<EOT
var chart = am4core.create("job-chart", am4charts.XYChart);

// Add data
chart.data = $chartData;

// Create axes

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "title";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;
categoryAxis.renderer.labels.template.disabled = true;
categoryAxis.title.text = "Executions";
        
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.title.text = "Duration (sec)";

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "value";
series.dataFields.categoryX = "title";
series.name = "Duration";
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;
EOT;
$this->registerJs($js);
?>
