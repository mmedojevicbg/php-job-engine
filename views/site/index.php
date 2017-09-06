<h1>Dashboard</h1>
<div class="row">
    <div class="col-xs-6">
        <div class="panel panel-default dashboard-panel">
            <div class="panel-heading">
                <h3 class="panel-title">Recent notifications</h3>
            </div>
            <div class="panel-body">
                <?php
                foreach($notifications as $n) {
                    switch($n->notification_type) {
                        case app\models\PjeNotification::TYPE_SUCCESS:
                            $class = 'success';
                            break;
                        case app\models\PjeNotification::TYPE_INFO:
                            $class = 'info';
                            break;
                        case app\models\PjeNotification::TYPE_WARNING:
                            $class = 'warning';
                            break;
                        case app\models\PjeNotification::TYPE_ERROR:
                            $class = 'error';
                            break;
                    }
                    ?>
                    <div class="<?= $class ?>"><a href="/stats/index?id=<?= $n->execution_id ?>"><?= $n->notification_date ?>: <?= $n->message ?></a></div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="panel panel-default dashboard-panel">
            <div class="panel-heading">
                <h3 class="panel-title">Longest steps in last 7 days</h3>
            </div>
            <div class="panel-body">
                <canvas id="myChart"></canvas>
                <?php
$js = <<<EOT
                    $(function(){
                        var ctx = document.getElementById("myChart");
                        var longestStepsData = {$longestStepsData};
                        var data = {
                            labels: longestStepsData.titles,
                            datasets: [
                                {
                                    label: "Steps",
                                    data: longestStepsData.durations,
                                }
                            ]
                        };
                        var myBarChart = new Chart(ctx, {
                            type: 'bar',
                            data: data,
                            options: {
                                scales: {
                                    xAxes: [{
                                        ticks: {
                                            fontSize: 8
                                        }
                                    }]
                                }
                            }
                        });
                    });
EOT;
$this->registerJs($js);
?>
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="panel panel-default dashboard-panel">
            <div class="panel-heading">
                <h3 class="panel-title">In progress</h3>
            </div>
            <div class="panel-body" id="in-progress">
                <?php
                $js = <<<EOT
                    $(function(){
                        function reloadInProgressData() {
                            $('#in-progress').load('/site/in-progress');
                        }
                        reloadInProgressData();
                        setInterval(reloadInProgressData, 3000);
                    });
EOT;
                $this->registerJs($js);
                ?>
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="panel panel-default dashboard-panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tests</h3>
            </div>
            <div class="panel-body">
                <?php 
                    if(count($testDates)) {
                ?>
                        <?= yii\helpers\Html::beginForm('/', 'get') ?>
                        <?= yii\helpers\Html::dropDownList('test_date', $selectedTestDate, array_combine($testDates, $testDates)) ?>
                        <?= yii\helpers\Html::submitButton() ?>
                        <?= yii\helpers\Html::endForm() ?>
                        <br />
                        <table class="system-status-report">
                            <tbody>
                            <?php
                                foreach($testExecutionData as $td) {
                                    $statusClass = '';
                                    switch($td['status']) {
                                        case app\components\Test::STATUS_SUCCESS:
                                            $statusClass = 'sys-ok';
                                        break;
                                        case app\components\Test::STATUS_WARNING:
                                            $statusClass = 'sys-warning';
                                        break;
                                        case app\components\Test::STATUS_FAIL:
                                            $statusClass = 'sys-error';
                                        break;
                                    }
                                    ?>
                                    <tr class="<?= $statusClass; ?>">
                                        <td class="status-icon">
                                            <div title="<?= $statusClass; ?>">&nbsp;</div>
                                        </td>
                                        <td class="status-title"><?= $td['test_class']; ?></td>
                                        <td class="status-value"><?= $td['response']; ?></td>
                                    </tr>
                                    <?php
                                }
                            ?>             
                            </tbody>
                        </table>
                <?php 
                    } else {
                ?>
                        No data
                <?php 
                    }
                ?>
            </div>
        </div>
    </div>
</div>