<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m190526_122605_create_users_table extends Migration
{
    protected $tableName = 'users';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'username' => $this->string(100)->notNull()->unique(),
            'password' => $this->string(100),
            'authKey' => $this->string(100),
            'accessToken' => $this->string(100)
        ]);

        $this->batchInsert($this->tableName, ['username', 'password', 'authKey', 'accessToken'], [
            ['admin', 'admin', 'test100key', '100-token'],
            ['demo', 'demo', 'test101key', '101-token'],
        ]);

        $taskTable = \app\models\tables\Tasks::tableName();

        $this->addForeignKey('fk_task_creators',$taskTable, 'creator_id', $this->tableName, 'id');
        $this->addForeignKey('fk_task_responsible',$taskTable, 'responsible_id', $this->tableName, 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
