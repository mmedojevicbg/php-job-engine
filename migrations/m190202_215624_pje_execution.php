<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190202_215624_pje_execution
 */
class m190202_215624_pje_execution extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pje_execution', [
            'id' => Schema::TYPE_PK,
            'start_time' => Schema::TYPE_DATETIME,
            'end_time' => Schema::TYPE_DATETIME,
            'duration' => Schema::TYPE_INTEGER,
            'success' => Schema::TYPE_BOOLEAN,
            'job_id' => Schema::TYPE_INTEGER . ' NOT NULL'
        ]);
        $this->addForeignKey('pje_execution_fk1', 'pje_execution', 'job_id', 'pje_job', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190202_215624_pje_execution cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190202_215624_pje_execution cannot be reverted.\n";

        return false;
    }
    */
}
