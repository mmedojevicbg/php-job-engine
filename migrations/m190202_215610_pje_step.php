<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190202_215610_pje_step
 */
class m190202_215610_pje_step extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pje_step', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'step_class' => Schema::TYPE_STRING . ' NOT NULL',
            'is_active' => Schema::TYPE_BOOLEAN . ' NOT NULL'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190202_215610_pje_step cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190202_215610_pje_step cannot be reverted.\n";

        return false;
    }
    */
}
