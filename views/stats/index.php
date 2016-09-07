<?= yii\helpers\Html::beginForm('/stats/index', 'get') ?>
<?= yii\helpers\Html::dropDownList('id', $id, $listData) ?>
<?= yii\helpers\Html::submitButton() ?>
<?= yii\helpers\Html::endForm() ?>

<?php
if($execution) {
    ?>  
        <h2>Execution data</h2>
        <div><b>Start time: </b><?= $execution->start_time; ?></div>
        <div><b>End time: </b><?= $execution->end_time; ?></div>
        <div><b>Job: </b><?= $execution->job->title; ?></div>
        <div><b>Duration: </b><?= $execution->duration; ?> sec</div>
        <div><b>Success: </b><?= $execution->success ? 'YES' : 'NO'; ?></div>
        <h2>Steps</h2>
        <table border="1" style="width: 800xp;">
            <tr>
                <th>step</th>
                <th>start_time</th>
                <th>end_time</th>
                <th>duration</th>
                <th>success</th>
                <th>response_message</th>
            </tr>
            <?php
            foreach($tableData as $step) {
                ?>
                <tr>
                    <td><?= $step['step'] ?></td>
                    <td><?= $step['start_time'] ?></td>
                    <td><?= $step['end_time'] ?></td>
                    <td><?= $step['duration'] ?></td>
                    <td><?= $step['success'] ?></td>
                    <td><?= $step['response_message'] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    <?php
}
?>