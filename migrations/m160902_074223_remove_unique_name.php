<?php

use yii\db\Migration;

class m160902_074223_remove_unique_name extends Migration
{
    public function up()
    {
        $this->dropColumn('pje_job_step', 'unique_name');
    }

    public function down()
    {
        echo "m160902_074223_remove_unique_name cannot be reverted.\n";

        return false;
    }
}
