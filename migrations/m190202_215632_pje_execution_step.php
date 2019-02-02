<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190202_215632_pje_execution_step
 */
class m190202_215632_pje_execution_step extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pje_execution_step', [
            'execution_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'job_step_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'start_time' => Schema::TYPE_DATETIME,
            'end_time' => Schema::TYPE_DATETIME,
            'duration' => Schema::TYPE_INTEGER,
            'success' => Schema::TYPE_BOOLEAN,
            'response_message' => Schema::TYPE_TEXT,
            'average_cpu_usage' => Schema::TYPE_INTEGER
        ]);
        $this->addPrimaryKey('pje_execution_step_pk', 'pje_execution_step', ['execution_id', 'job_step_id']);
        $this->addForeignKey('pje_execution_step_fk1', 'pje_execution_step', 'execution_id', 'pje_execution', 'id');
        $this->addForeignKey('pje_execution_step_fk2', 'pje_execution_step', 'job_step_id', 'pje_job_step', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190202_215632_pje_execution_step cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190202_215632_pje_execution_step cannot be reverted.\n";

        return false;
    }
    */
}
