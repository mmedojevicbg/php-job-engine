<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190202_215644_pje_job_step_param
 */
class m190202_215644_pje_job_step_param extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pje_job_step_param', [
            'id' => Schema::TYPE_PK,
            'job_step_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'param_name' => Schema::TYPE_STRING . ' NOT NULL',
            'param_value' => Schema::TYPE_STRING . ' NOT NULL'
        ]);
        $this->addForeignKey('pje_job_step_param_fk1', 'pje_job_step_param', 'job_step_id', 'pje_job_step', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190202_215644_pje_job_step_param cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190202_215644_pje_job_step_param cannot be reverted.\n";

        return false;
    }
    */
}
