<?php

namespace common\models;

use common\components\AuthorBehavior;
use common\components\LogBehavior;
use common\models\query\StudentQuery;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%student}}".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $gender
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $user_id
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%student}}';
    }

    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
            'log' => [
                'class' => LogBehavior::class
            ],
            'author' => [
                'class' => AuthorBehavior::class
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['created_at', 'updated_at', 'user_id'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 512],
            [['gender'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'gender' => Yii::t('app', 'Gender'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return StudentQuery the active query used by this AR class.
     */
    public static function find(): StudentQuery
    {
        return new StudentQuery(get_called_class() );
    }
}
