<?php

use yii\db\Migration;

/**
 * Class m230919_095459_test
 */
class m230919_095459_test extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test}}', [
            'id' => $this->primaryKey(),
            'lesson_id' => $this->integer(),
            'test_name' => $this->string(),
            'count_question' => $this->integer(),
            'type' => $this->text(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-test-lesson_id',
            '{{%test}}',
            'lesson_id'
        );

        $this->addForeignKey(
            'fk-test-lesson_id-lesson-id',
            '{{%test}}',
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
            'fk-test-lesson_id-lesson-id',
            '{{%test}}',
        );

        $this->dropIndex(
            'idx-test-lesson_id',
            '{{%test}}',
        );

        $this->dropTable('{{%test}}');
    }
}
