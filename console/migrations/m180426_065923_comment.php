<?php

use yii\db\Migration;

/**
 * Class m180426_065923_comment
 */
class m180426_065923_comment extends Migration
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
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'create_time' => $this->integer()->defaultValue(null),
            'userid' => $this->integer()->notNull(),
            'email' => $this->string(128)->notNull(),
            'url' => $this->string(128)->defaultValue(null),
            'post_id' => $this->integer()->notNull(),
            'remind' => $this->smallInteger(4)->notNull()->defaultValue(0)->comment('0:未提醒1：已提醒'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180426_065923_comment cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180426_065923_comment cannot be reverted.\n";

        return false;
    }
    */
}
