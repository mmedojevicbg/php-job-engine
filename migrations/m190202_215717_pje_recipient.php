<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190202_215717_pje_recipient
 */
class m190202_215717_pje_recipient extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
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

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190202_215717_pje_recipient cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190202_215717_pje_recipient cannot be reverted.\n";

        return false;
    }
    */
}
