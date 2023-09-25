<?php

namespace common\models;

use common\components\AuthorBehavior;
use common\models\query\AnswerQuery;
use common\models\query\QuestionQuery;
use common\models\query\QuestionStudentQuery;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%answer}}".
 *
 * @property int $id
 * @property int|null $question_id
 * @property string|null $text
 * @property int|null $sort
 * @property int|null $truth
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Question $question
 * @property QuestionStudent[] $questionStudents
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%answer}}';
    }

    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
            'author' => [
                'class' => AuthorBehavior::class
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question_id', 'sort', 'truth', 'created_at', 'updated_at'], 'integer'],
            [['text'], 'string'],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Question::class, 'targetAttribute' => ['question_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'question_id' => Yii::t('app', 'Question ID'),
            'text' => Yii::t('app', 'Text'),
            'sort' => Yii::t('app', 'Sort'),
            'truth' => Yii::t('app', 'Truth'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Question]].
     *
     * @return \yii\db\ActiveQuery|QuestionQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::class, ['id' => 'question_id']);
    }

    /**
     * Gets query for [[QuestionStudents]].
     *
     * @return \yii\db\ActiveQuery|QuestionStudentQuery
     */
    public function getQuestionStudents()
    {
        return $this->hasMany(QuestionStudent::class, ['answer_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return AnswerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AnswerQuery(get_called_class());
    }
}
