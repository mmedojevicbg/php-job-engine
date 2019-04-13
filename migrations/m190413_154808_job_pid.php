<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190413_154808_job_pid
 */
class m190413_154808_job_pid extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pje_execution', 'pid', Schema::TYPE_INTEGER);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190413_154808_job_pid cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190413_154808_job_pid cannot be reverted.\n";

        return false;
    }
    */
}
