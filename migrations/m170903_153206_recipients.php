<?php

use yii\db\Schema;
use yii\db\Migration;

class m170903_153206_recipients extends Migration
{
    public function up()
    {
        $this->createTable('pje_recipient', [
            'id' => Schema::TYPE_PK,
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'job_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'notify_on_success' => Schema::TYPE_BOOLEAN,
            'notify_on_failure' => Schema::TYPE_BOOLEAN
        ]);
        $this->createIndex(
            'recipient-job-idx',
            'pje_recipient',
            'job_id'
        );
        $this->addForeignKey(
            'recipient-job-fk',
            'pje_recipient',
            'job_id',
            'pje_job',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m170903_153206_recipients cannot be reverted.\n";

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
