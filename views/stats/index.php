<div class="row">
        <div class="col-xs-12">
          <?= yii\helpers\Html::beginForm('/stats/index', 'get') ?>
          <div class="box box-primary">
            <div class="box-body">
                <label>Select execution</label>
                <?= yii\helpers\Html::dropDownList('id', $id, $listData, ['class' => 'form-control']) ?>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
          <!-- /.box -->
          <?= yii\helpers\Html::endForm() ?>
        </div>
        <!-- /.col -->
</div> 

<?php
if ($execution) {
    ?>  
        <div class="row">
                <div class="col-xs-12">
                  <div class="box box-info">
                    <div class="box-header">Execution data</div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div><b>Start time: </b><?= $execution->start_time; ?></div>
                        <div><b>End time: </b><?= $execution->end_time; ?></div>
                        <div><b>Job: </b><?= $execution->job->title; ?></div>
                        <div><b>Duration: </b><?= $execution->duration; ?> sec</div>
                        <div><b>Success: </b><?= $execution->success ? 'YES' : 'NO'; ?></div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.col -->
        </div> 
        <div class="row">
                <div class="col-xs-12">
                  <div class="box box-success">
                    <div class="box-header">Steps</div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?= yii\grid\GridView::widget([
                            'tableOptions' => [
                                'class' => 'table table-striped table-bordered dataTable',
                            ],
                            'options' => [
                                'class' => 'table-responsive',
                            ],
                            'dataProvider' => $tableData,
                            'columns' => [
                                [
                                    'label' => 'Step',
                                    'attribute' => 'job_step_id',
                                    'value' => 'jobStep.title',
                                ],
                                'start_time',
                                'end_time',
                                'duration',
                                [
                                    'attribute' => 'success',
                                    'value' => function ($model) {
                                        return $model->success ? 'Yes' : 'No';
                                    },
                                ],
                                'response_message'
                            ],
                        ]); ?>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.col -->
        </div>
<?php
}
?>