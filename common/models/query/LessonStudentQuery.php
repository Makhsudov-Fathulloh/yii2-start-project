<?php

namespace common\models\query;

use common\models\LessonStudent;
use yii\db\ActiveRecord;

/**
 * This is the ActiveQuery class for [[\frontend\models\LessonStudent]].
 *
 * @see \common\models\LessonStudent
 */
class LessonStudentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return LessonStudent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return array|ActiveRecord|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
