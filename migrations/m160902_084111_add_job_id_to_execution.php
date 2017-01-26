<?php

use yii\db\Schema;
use yii\db\Migration;

class m160902_084111_add_job_id_to_execution extends Migration
{
    public function up()
    {
        $this->addColumn('pje_execution', 'job_id', Schema::TYPE_INTEGER . ' NOT NULL');
    }

    public function down()
    {
        echo "m160902_084111_add_job_id_to_execution cannot be reverted.\n";

        return false;
    }
}
