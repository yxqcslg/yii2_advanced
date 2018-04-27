<?php

use yii\db\Migration;

/**
 * Class m180426_063129_post
 */
class m180426_063129_post extends Migration
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
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(128)->notNull(),
            'content' => $this->text()->notNull(),
            'tags' => $this->text()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'create_time' => $this->integer()->notNull(),
            'update_time' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180426_063129_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180426_063129_post cannot be reverted.\n";

        return false;
    }
    */
}
