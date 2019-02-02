<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190202_215603_pje_job
 */
class m190202_215603_pje_job extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pje_job', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'job_class' => Schema::TYPE_STRING,
            'parallel' => Schema::TYPE_BOOLEAN
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190202_215603_pje_job cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190202_215603_pje_job cannot be reverted.\n";

        return false;
    }
    */
}
