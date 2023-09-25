<?php

namespace common\models\query;

use common\models\Lesson;
use yii\db\ActiveRecord;

/**
 * This is the ActiveQuery class for [[\frontend\models\Lesson]].
 *
 * @see \common\models\Lesson
 */
class LessonQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Lesson[]|array
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
