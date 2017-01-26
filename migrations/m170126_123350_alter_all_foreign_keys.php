<?php

use yii\db\Migration;

class m170126_123350_alter_all_foreign_keys extends Migration
{
    public function up()
    {
        $this->dropForeignKey('pje_job_step_fk1', 'pje_job_step');
        $this->dropForeignKey('pje_job_step_fk2', 'pje_job_step');
        $this->dropForeignKey('pje_execution_step_fk1', 'pje_execution_step');
        $this->dropForeignKey('pje_execution_step_fk2', 'pje_execution_step');
        $this->dropForeignKey('pje_execution_fk1', 'pje_execution');
        $this->dropForeignKey('pje_job_step_param_fk1', 'pje_job_step_param');
        $this->dropForeignKey('pje_notification_fk1', 'pje_notification');
        $this->addForeignKey('pje_job_step_fk1', 'pje_job_step', 'job_id', 'pje_job', 'id', 'cascade', 'cascade');
        $this->addForeignKey('pje_job_step_fk2', 'pje_job_step', 'step_id', 'pje_step', 'id', 'cascade', 'cascade');
        $this->addForeignKey('pje_execution_step_fk1', 'pje_execution_step', 'execution_id', 'pje_execution', 'id', 'cascade', 'cascade');
        $this->addForeignKey('pje_execution_step_fk2', 'pje_execution_step', 'job_step_id', 'pje_job_step', 'id', 'cascade', 'cascade');
        $this->addForeignKey('pje_execution_fk1', 'pje_execution', 'job_id', 'pje_job', 'id', 'cascade', 'cascade');
        $this->addForeignKey('pje_job_step_param_fk1', 'pje_job_step_param', 'job_step_id', 'pje_job_step', 'id', 'cascade', 'cascade');
        $this->addForeignKey('pje_notification_fk1', 'pje_notification', 'execution_id', 'pje_execution', 'id', 'cascade', 'cascade');
    }

    public function down()
    {
        echo "m170126_123350_alter_all_foreign_keys cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
