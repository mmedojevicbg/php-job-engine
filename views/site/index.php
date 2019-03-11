<?php $this->beginBlock('content-header') ?>
Dashboard
<?php $this->endBlock() ?>
<?=
$this->render('_filter', [
    'jobs' => $jobs,
    'selectedJob' => $selectedJob
]);
?>
<?=
    $this->render('_widgets', [
        'completedCount' => $completedCount,
        'failedCount' => $failedCount,
        'avgDuration' => $avgDuration,
        'maxDuration' => $maxDuration
    ]);
?>
<div class="row">
    <div class="col-md-6">
       <?=
        $this->render('_last_execution', ['dataProvider' => $lastExecutionsProvider]);
       ?>
    </div>
     <div class="col-md-6">
       <?=
        $this->render('_failed_execution', ['dataProvider' => $failedExecutionsProvider]);
       ?>
    </div>
</div>