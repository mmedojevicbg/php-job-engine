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