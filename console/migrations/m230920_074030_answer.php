<?php

use yii\db\Migration;

/**
 * Class m230920_074030_answer
 */
class m230920_074030_answer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%answer}}', [
            'id' => $this->primaryKey(),
            'question_id' => $this->integer(),
            'text' => $this->text(),
            'sort' => $this->integer(),
            'truth' => $this->boolean(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-answer-question_id',
            '{{%answer}}',
            'question_id'
        );

        $this->addForeignKey(
            'fk-answer-question_id-question-id',
            '{{%answer}}',
            'question_id',
            '{{%question}}',
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
            'fk-answer-question_id-question-id',
            '{{%answer}}',
        );

        $this->dropIndex(
            'idx-answer-question_id',
            '{{%answer}}',
        );

        $this->dropTable('{{%answer}}');
    }
}
