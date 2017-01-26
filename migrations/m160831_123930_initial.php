<?php

use yii\db\Schema;
use yii\db\Migration;

class m160831_123930_initial extends Migration
{
    public function up()
    {
        $this->createTable('pje_job', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
        ]);
        $this->createTable('pje_step', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'step_class' => Schema::TYPE_STRING . ' NOT NULL',
            'is_active' => Schema::TYPE_BOOLEAN . ' NOT NULL',
        ]);
        $this->createTable('pje_job_step', [
            'id' => Schema::TYPE_PK,
            'job_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'step_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'unique_name' => Schema::TYPE_STRING . ' NOT NULL',
            'order_num' => Schema::TYPE_INTEGER . ' NOT NULL',
            'stop_on_failure' => Schema::TYPE_BOOLEAN . ' NOT NULL',
        ]);
        $this->createTable('pje_execution', [
            'id' => Schema::TYPE_PK,
            'start_time' => Schema::TYPE_DATETIME,
            'end_time' => Schema::TYPE_DATETIME,
            'duration' => Schema::TYPE_INTEGER,
            'success' => Schema::TYPE_BOOLEAN,
        ]);
        $this->createTable('pje_execution_step', [
            'execution_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'job_step_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'start_time' => Schema::TYPE_DATETIME,
            'end_time' => Schema::TYPE_DATETIME,
            'duration' => Schema::TYPE_INTEGER,
            'success' => Schema::TYPE_BOOLEAN,  
            'response_message' => Schema::TYPE_TEXT
        ]);
        $this->addPrimaryKey('pje_execution_step_pk', 'pje_execution_step', ['execution_id', 'job_step_id']);
    }

    public function down()
    {
        echo "m160831_123930_initial cannot be reverted.\n";

        return false;
    }
}
