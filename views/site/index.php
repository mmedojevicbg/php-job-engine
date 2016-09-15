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
                            data: data
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
                <h3 class="panel-title">Panel title</h3>
            </div>
            <div class="panel-body">
                Panel content
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="panel panel-default dashboard-panel">
            <div class="panel-heading">
                <h3 class="panel-title">Panel title</h3>
            </div>
            <div class="panel-body">
                Panel content
            </div>
        </div>
    </div>
</div>