<?php

use yii\db\Migration;

/**
 * Class m230918_094639_lesson_student
 */
class m230918_094639_lesson_student extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lesson_student}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer(),
            'lesson_id' => $this->integer(),
            'lesson_name' => $this->string(),
            'lesson_content' => $this->text(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-lesson_student-course_id',
            '{{%lesson_student}}',
            'course_id'
        );

        $this->addForeignKey(
            'fk-lesson_student-course_id-course_student-id',
            '{{%lesson_student}}',
            'course_id',
            '{{%course_student}}',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-lesson_student-lesson_id',
            '{{%lesson_student}}',
            'lesson_id'
        );

        $this->addForeignKey(
            'fk-lesson_student-lesson_id-lesson-id',
            '{{%lesson_student}}',
            'lesson_id',
            '{{%lesson}}',
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
            'fk-lesson_student-course_id-course_student-id',
            '{{%lesson_student}}',
        );

        $this->dropIndex(
            'idx-lesson-course_id',
            '{{%lesson_student}}',
        );

        $this->dropForeignKey(
            'fk-lesson_student-lesson_id-lesson-id',
            '{{%lesson_student}}',
        );

        $this->dropIndex(
            'idx-lesson_student-lesson_id',
            '{{%lesson_student}}',
        );

        $this->dropTable('{{%lesson_student}}');
    }
}
