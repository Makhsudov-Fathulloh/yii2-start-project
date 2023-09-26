<?php

use yii\db\Migration;

/**
 * Class m230926_060754_log
 */
class m230926_060754_log extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->createTable('{{%log}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'old_value' => $this->json(),
            'new_value' => $this->json(),
            'model_class' =>$this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-log-user_id',
            '{{%log}}',
            'user_id'
        );

        $this->addForeignKey(
            'fk-log-user_id-user-id',
            '{{%log}}',
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
            'fk-log-user_id-user-id',
            '{{%log}}',
        );

        $this->dropIndex(
            'idx-log-user_id',
            '{{%log}}',
        );

        $this->dropTable('{{%log}}');
    }
}
