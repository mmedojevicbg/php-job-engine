<?php
use yii\grid\GridView;

?>
<div class="box">
<div class="box-header">
  <h3 class="box-title">Last 10 executions</h3>
</div>
<!-- /.box-header -->
<div class="box-body no-padding">    
    <?= GridView::widget([
        'tableOptions' => [
            'class' => 'table table-striped',
        ],
        'options' => [
            'class' => 'table-responsive',
        ],
        'summary' => '',
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header' => 'Job',
                'value' => 'job.title'
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