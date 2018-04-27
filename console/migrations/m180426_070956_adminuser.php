<?php

use yii\db\Migration;

/**
 * Class m180426_070956_adminuser
 */
class m180426_070956_adminuser extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%adminuser}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(128)->notNull(),
            'nickname' => $this->string(128)->notNull(),
            'password' => $this->string(128)->notNull(),
            'email' => $this->string(128)->notNull(),
            'profile' => $this->text(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string(255)->notNull(),
            'password_reset_token' => $this->string(255)->defaultValue(null),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180426_070956_adminuser cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180426_070956_adminuser cannot be reverted.\n";

        return false;
    }
    */
}
