<?php

use yii\db\Schema;
use yii\db\Migration;

class m160905_114103_job_class extends Migration
{
    public function up()
    {
        $this->addColumn('pje_job', 'job_class', Schema::TYPE_STRING);    
        $this->createTable('pje_job_step_param', [
            'id' => Schema::TYPE_PK,
            'job_step_id' => Schema::TYPE_INTEGER,
            'param_name' => Schema::TYPE_STRING,
            'param_value' => Schema::TYPE_STRING
        ]);
        $this->addForeignKey('pje_job_step_param_fk1', 'pje_job_step_param', 'job_step_id', 'pje_job_step', 'id');
    }

    public function down()
    {
        echo "m160905_114103_job_class cannot be reverted.\n";

        return false;
    }
}
