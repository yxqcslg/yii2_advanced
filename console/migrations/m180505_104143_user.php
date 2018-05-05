<?php

use yii\db\Migration;

class m180505_104143_user extends Migration
{
    public function up()
    {
		$this->addColumn(\common\models\User::tableName(), 'user_id', 'INT(11) DEFAULT 0 COMMENT "计划人" AFTER `titile`');

    }

    public function down()
    {
        echo "m180505_104143_user cannot be reverted.\n";

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
