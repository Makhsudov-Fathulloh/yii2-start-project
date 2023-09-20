<?php

use yii\db\Migration;

/**
 * Class m230920_074707_question_student
 */
class m230920_074707_question_student extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%question_student}}', [
            'id' => $this->primaryKey(),
            'student_id' => $this->integer(),
            'question_id' => $this->integer(),
            'answer_id' => $this->integer(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-question_student-student_id',
            '{{%question_student}}',
            'student_id'
        );

        $this->addForeignKey(
            'fk-question_student-student_id-student-id',
            '{{%question_student}}',
            'student_id',
            '{{%student}}',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-question_student-question_id',
            '{{%question_student}}',
            'question_id'
        );

        $this->addForeignKey(
            'fk-question_student-question_id-question-id',
            '{{%question_student}}',
            'question_id',
            '{{%question}}',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-question_student-answer_id',
            '{{%question_student}}',
            'answer_id'
        );

        $this->addForeignKey(
            'fk-question_student-answer_id-answer-id',
            '{{%question_student}}',
            'answer_id',
            '{{%answer}}',
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
            'fk-question_student-student_id-student-id',
            '{{%question_student}}',
        );

        $this->dropIndex(
            'idx-question_student-student_id',
            '{{%question_student}}',
        );

        $this->dropForeignKey(
            'fk-question_student-question_id-question-id',
            '{{%question_student}}',
        );

        $this->dropIndex(
            'idx-question_student-question_id',
            '{{%question_student}}',
        );

        $this->dropForeignKey(
            'fk-question_student-answer_id-answer-id',
            '{{%question_student}}',
        );

        $this->dropIndex(
            'idx-question_student-answer_id',
            '{{%question_student}}',
        );

        $this->dropTable('{{%question_student}}');
    }
}
