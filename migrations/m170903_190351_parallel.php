<?php

use yii\db\Migration;

class m170903_190351_parallel extends Migration
{
    public function up()
    {
        $this->addColumn('pje_job', 'parallel', yii\db\Schema::TYPE_BOOLEAN);
    }

    public function down()
    {
        echo "m170903_190351_parallel cannot be reverted.\n";

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
