<?php

use yii\db\Schema;
use yii\db\Migration;

class m170905_103614_tests extends Migration
{
    public function up()
    {
        $this->createTable('pje_test', [
            'id' => Schema::TYPE_PK,
            'test_class' => Schema::TYPE_STRING . ' NOT NULL',
            'is_active' => Schema::TYPE_BOOLEAN
        ]);
        $this->createTable('pje_execution_test', [
            'id' => Schema::TYPE_PK,
            'test_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'test_time' => Schema::TYPE_DATETIME,
            'response' => Schema::TYPE_STRING,
            'status' => Schema::TYPE_INTEGER . ' NOT NULL'
        ]);
        $this->createIndex(
            'execution-test-idx',
            'pje_execution_test',
            'test_id'
        );
        $this->addForeignKey(
            'execution-test-fk',
            'pje_execution_test',
            'test_id',
            'pje_test',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m170905_103614_tests cannot be reverted.\n";

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
