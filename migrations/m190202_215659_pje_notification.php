<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190202_215659_pje_notification
 */
class m190202_215659_pje_notification extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pje_notification', [
            'id' => Schema::TYPE_PK,
            'execution_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'message' => Schema::TYPE_STRING,
            'notification_type' => Schema::TYPE_INTEGER,
            'notification_date' => Schema::TYPE_DATETIME
        ]);
        $this->addForeignKey('pje_notification_fk1', 'pje_notification', 'execution_id', 'pje_execution', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190202_215659_pje_notification cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190202_215659_pje_notification cannot be reverted.\n";

        return false;
    }
    */
}
