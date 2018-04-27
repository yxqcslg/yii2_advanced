<?php

use yii\db\Migration;

/**
 * Class m180426_070747_commentstatus
 */
class m180426_070747_commentstatus extends Migration
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

        $this->createTable('{{%commentstatus}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
            'position' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180426_070747_commentstatus cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180426_070747_commentstatus cannot be reverted.\n";

        return false;
    }
    */
}
