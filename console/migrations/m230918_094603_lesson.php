<?php

use yii\db\Migration;

/**
 * Class m230918_094603_lesson
 */
class m230918_094603_lesson extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lesson}}', [
            'id' => $this->primaryKey(),
            'student_id' => $this->integer(),
            'lesson_name' => $this->string(),
            'lesson_content' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-lesson-student_id',
            '{{%lesson}}',
            'student_id'
        );

        $this->addForeignKey(
            'fk-lesson-student_id-student-id',
            '{{%lesson}}',
            'student_id',
            '{{%student}}',
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
            'fk-lesson-student_id-student-id',
            '{{%lesson}}',
        );

        $this->dropIndex(
            'idx-lesson-student_id',
            '{{%lesson}}',
        );

        $this->dropTable('{{%lesson}}');
    }
}
