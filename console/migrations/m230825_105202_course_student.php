<?php

use yii\db\Migration;

/**
 * Class m230825_105202_course_student
 */
class m230825_105202_course_student extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course_student}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer(),
            'student_id' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-course_student-course_id',
            '{{%course_student}}',
            'course_id'
        );

        $this->addForeignKey(
            'fk-course_student-course_id-course-id',
            '{{%course_student}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-course_student-student_id',
            '{{%course_student}}',
            'student_id'
        );

        $this->addForeignKey(
            'fk-course_student_student_id-student-id',
            '{{%course_student}}',
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
            'fk-course_student-course_id-course-id',
            '{{%course_student}}',
        );

        $this->dropIndex(
            'idx-course_student-course_id',
            '{{%course_student}}',
        );

        $this->dropForeignKey(
            'fk-course_student_student_id-student-id',
            '{{%course_student}}',
        );

        $this->dropIndex(
            'idx-course_student-student_id',
            '{{%course_student}}',
        );


        $this->dropTable('{{%course_student}}');
    }
}
