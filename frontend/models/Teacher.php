<?php

namespace frontend\models;

use common\models\User;
use frontend\models\query\TeacherQuery;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%teacher}}".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property int|null $user_id
 * @property int $status
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $user
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%teacher}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 512],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => Yii::t('app', 'User ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQuery
     */
    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return TeacherQuery the active query used by this AR class.
     */
    public static function find(): TeacherQuery
    {
        return new TeacherQuery(get_called_class());
    }
}