<?php

use yii\db\Migration;

/**
 * Class m230919_112733_question
 */
class m230919_112733_question extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%question}}', [
            'id' => $this->primaryKey(),
            'lesson_id' => $this->integer(),
            'test_id' => $this->integer(),
            'text' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-question-lesson_id',
            '{{%question}}',
            'lesson_id'
        );

        $this->addForeignKey(
            'fk-question-lesson_id-lesson-id',
            '{{%question}}',
            'lesson_id',
            '{{%lesson}}',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-question-test_id',
            '{{%question}}',
            'test_id'
        );

        $this->addForeignKey(
            'fk-question-test_id-test-id',
            '{{%question}}',
            'test_id',
            '{{%test}}',
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
            'fk-question-lesson_id-lesson-id',
            '{{%question}}',
        );

        $this->dropIndex(
            'idx-question-lesson_id',
            '{{%question}}',
        );

        $this->dropForeignKey(
            'fk-question-test_id-test-id',
            '{{%question}}',
        );

        $this->dropIndex(
            'idx-question-test_id',
            '{{%question}}',
        );

        $this->dropTable('{{%question}}');
    }
}
