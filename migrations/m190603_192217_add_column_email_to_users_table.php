<?php

use yii\db\Migration;

/**
 * Class m190603_192217_add_column_email_to_users_table
 */
class m190603_192217_add_column_email_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'email', 'varchar(100)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users', 'email');

        echo "m190603_192217_add_column_email_to_users_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190603_192217_add_column_email_to_users_table cannot be reverted.\n";

        return false;
    }
    */
}
