<?php

namespace common\models;

use common\components\AuthorBehavior;
use common\models\query\CourseStudentQuery;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%course_student}}".
 *
 * @property int $id
 * @property int|null $course_id
 * @property int|null $student_id
 * @property int $status
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Course $course
 * @property Student $student
 */
class CourseStudent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%course_student}}';
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
    public function rules(): array
    {
        return [
            [['course_id', 'student_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['course_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::class, 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'course_id' => Yii::t('app', 'Course ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return ActiveQuery|\common\models\query\CourseQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::class, ['id' => 'course_id']);
    }

    /**
     * Gets query for [[Student]].
     *
     * @return ActiveQuery
     */
    public function getStudent(): ActiveQuery
    {
        return $this->hasOne(Student::class, ['id' => 'student_id']);
    }

    /**
     * {@inheritdoc}
     * @return CourseStudentQuery the active query used by this AR class.
     */
    public static function find(): CourseStudentQuery
    {
        return new CourseStudentQuery(get_called_class());
    }
}
