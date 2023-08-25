<?php

use yii\db\Migration;

/**
 * Class m230825_095241_teacher
 */
class m230825_095241_teacher extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%teacher}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(512),
            'last_name' => $this->string(512),
            'user_id' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-teacher-user_id',
            '{{%teacher}}',
            'user_id'
        );

        $this->addForeignKey(
            'fk-teacher_user_id-user-id',
            '{{%teacher}}',
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
            'fk-teacher_user_id-user-id',
            '{{%teacher}}',
        );

        $this->dropIndex(
            'idx-teacher-user_id',
            '{{%teacher}}',
        );

        $this->dropTable('{{%teacher}}');
    }
}
