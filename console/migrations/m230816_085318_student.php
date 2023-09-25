<?php

use yii\db\Migration;

/**
 * Class m230816_085318_student
 */
class m230816_085318_student extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(512),
            'last_name' => $this->string(512),
            'gender' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'user_id' => $this->integer()
        ]);

        $this->createIndex(
            'idx-student-user_id',
            '{{%student}}',
            'user_id'
        );

        $this->addForeignKey(
            'fk-student-user_id-user-id',
            '{{%student}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-student-user_id-user-id',
            '{{%student}}',
        );

        $this->dropIndex(
            'idx-student-user_id',
            '{{%student}}',
        );

        $this->dropTable('{{%student}}');
    }
}
