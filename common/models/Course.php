<?php

namespace common\models;

use common\models\query\CourseQuery;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%course}}".
 *
 * @property int $id
 * @property int|null $teacher_id
 * @property string|null $course_name
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Teacher $teacher
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%course}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['teacher_id', 'created_at', 'updated_at'], 'integer'],
            [['course_name'], 'string', 'max' => 512],
            [['start_date', 'end_date'], 'string', 'max' => 255],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::class, 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'teacher_id' => Yii::t('app', 'Teacher ID'),
            'course_name' => Yii::t('app', 'Course Name'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return ActiveQuery
     */
    public function getTeacher(): ActiveQuery
    {
        return $this->hasOne(Teacher::class, ['id' => 'teacher_id']);
    }

    /**
     * {@inheritdoc}
     * @return CourseQuery the active query used by this AR class.
     */
    public static function find(): CourseQuery
    {
        return new CourseQuery(get_called_class());
    }
}
