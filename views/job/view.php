<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PjeJob */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pje-job-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <h2>Command</h2>
    <div><code><?= Yii::$app->basePath . DIRECTORY_SEPARATOR . 'yii execute-job ' , $model->id;?></code></div>

    <h2>Execution history</h2>
    <table border="1" style="width: 500px;">
        <tr>
            <th>Start time</th>
            <th>Duration</th>
            <th>Success</th>
        </tr>
        <?php
        foreach($executionHistory as $execution) {
            ?>
            <tr>
                <td><?= $execution['start_time']; ?></td>
                <td><?= $execution['duration']; ?></td>
                <td><?= $execution['success'] ? 'YES' : 'NO'; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <canvas id="myChart" width="300" height="150"></canvas>
</div>

<?php
$chartTitles = json_encode($chartData['title']);
$chartValues = json_encode($chartData['value']);
$js = <<<EOT
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
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
