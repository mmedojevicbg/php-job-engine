<?php
function iconForSuccess($success) {
    if(is_null($success)) {
        return '/images/loading.gif';
    } elseif($success) {
        return '/images/success.png';
    } else {
        return '/images/warning.png';
    }
}
if(count($data)) {
    $currentJob = false;
    foreach($data as $item) {
        if($item['id'] != $currentJob) {
            $currentJob = $item['id'];
            ?>
            <div><div style="width: 300px; height: 32px; display: inline-block; font-weight: bold; text-transform: uppercase;"><?= $item['job_title']?></div> <img style="width: 32px; height: 32px;" src="<?= iconForSuccess($item['job_success']) ?>" /></div>
            <?php
        }
        ?>
        <div style="padding-left: 20px;"><div style="width: 280px; height: 32px; display: inline-block;"><?= $item['step_title']?></div> <img style="width: 32px; height: 32px;" src="<?= iconForSuccess($item['step_success']) ?>" /></div>
        <?php
    }
} else {
    echo 'No data';
}
?>
