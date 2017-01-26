<?php

use yii\db\Schema;
use yii\db\Migration;

class m160907_134824_notifications extends Migration
{
    public function up()
    {
        $this->createTable('pje_notification', [
            'id' => Schema::TYPE_PK,
            'execution_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'message' => Schema::TYPE_STRING,
            'notification_type' => Schema::TYPE_INTEGER,
            'notification_date' => Schema::TYPE_DATETIME
        ]);
    }

    public function down()
    {
        echo "m160907_134824_notifications cannot be reverted.\n";

        return false;
    }
}
