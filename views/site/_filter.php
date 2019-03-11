<?php
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <form role="form" method="get">
              <div class="box-body">
                <div class="form-group">
                    <label>Select job</label>
                    <?= Html::dropDownList(
    'job-filter',
                                            $selectedJob,
                                            ['' => '-- all jobs --'] + ArrayHelper::map($jobs, 'id', 'title'),
                                            ['class' => 'form-control']
) ?>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Filter</button>
              </div>
            </form>
        </div>   
    </div>
</div>