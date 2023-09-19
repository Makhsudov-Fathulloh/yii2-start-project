<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%lesson_student}}".
 *
 * @property int $id
 * @property int|null $course_id
 * @property int|null $lesson_id
 * @property string|null $lesson_name
 * @property string|null $lesson_content
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property CourseStudent $course
 * @property Lesson $lesson
 */
class LessonStudent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%lesson_student}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'lesson_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['lesson_content'], 'string'],
            [['lesson_name'], 'string', 'max' => 255],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseStudent::class, 'targetAttribute' => ['course_id' => 'id']],
            [['lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lesson::class, 'targetAttribute' => ['lesson_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'course_id' => Yii::t('app', 'Course ID'),
            'lesson_id' => Yii::t('app', 'Lesson ID'),
            'lesson_name' => Yii::t('app', 'Lesson Name'),
            'lesson_content' => Yii::t('app', 'Lesson Content'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery|\frontend\models\query\CourseStudentQuery
     */
    public function getCourse()
    {
        return $this->hasOne(CourseStudent::class, ['id' => 'course_id']);
    }

    /**
     * Gets query for [[Lesson]].
     *
     * @return \yii\db\ActiveQuery|\frontend\models\query\LessonQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lesson::class, ['id' => 'lesson_id']);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\LessonStudentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\LessonStudentQuery(get_called_class());
    }
}
