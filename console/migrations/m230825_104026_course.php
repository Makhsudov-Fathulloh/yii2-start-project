<?php

use yii\db\Migration;

/**
 * Class m230825_104026_course
 */
class m230825_104026_course extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course}}', [
            'id' => $this->primaryKey(),
            'teacher_id' => $this->integer(),
            'course_name' => $this->string(512),
            'start_date' => $this->string(),
            'end_date' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-course-teacher_id',
            '{{%course}}',
            'teacher_id'
        );

        $this->addForeignKey(
            'fk-course-teacher_id-teacher-id',
            '{{%course}}',
            'teacher_id',
            '{{%teacher}}',
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
            'fk-course-teacher_id-teacher-id',
            '{{%course}}',
        );

        $this->dropIndex(
            'idx-course-teacher_id',
            '{{%course}}',
        );

        $this->dropTable('{{%course}}');
    }
}
