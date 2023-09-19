<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%lesson}}".
 *
 * @property int $id
 * @property int|null $student_id
 * @property string|null $lesson_name
 * @property string|null $lesson_content
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property LessonStudent[] $lessonStudents
 * @property Student $student
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%lesson}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'created_at', 'updated_at'], 'integer'],
            [['lesson_content'], 'string'],
            [['lesson_name'], 'string', 'max' => 255],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::class, 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'lesson_name' => Yii::t('app', 'Lesson Name'),
            'lesson_content' => Yii::t('app', 'Lesson Content'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[LessonStudents]].
     *
     * @return \yii\db\ActiveQuery|\frontend\models\query\LessonStudentQuery
     */
    public function getLessonStudents()
    {
        return $this->hasMany(LessonStudent::class, ['lesson_id' => 'id']);
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery|\frontend\models\query\StudentQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::class, ['id' => 'student_id']);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\LessonQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\LessonQuery(get_called_class());
    }
}
