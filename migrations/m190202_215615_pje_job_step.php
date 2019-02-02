<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190202_215615_pje_job_step
 */
class m190202_215615_pje_job_step extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pje_job_step', [
            'id' => Schema::TYPE_PK,
            'job_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'step_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'order_num' => Schema::TYPE_INTEGER . ' NOT NULL',
            'stop_on_failure' => Schema::TYPE_BOOLEAN . ' NOT NULL'
        ]);
        $this->addForeignKey('pje_job_step_fk1', 'pje_job_step', 'job_id', 'pje_job', 'id');
        $this->addForeignKey('pje_job_step_fk2', 'pje_job_step', 'step_id', 'pje_step', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190202_215615_pje_job_step cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190202_215615_pje_job_step cannot be reverted.\n";

        return false;
    }
    */
}
