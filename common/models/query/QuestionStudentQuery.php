<?php

namespace common\models\query;

use common\models\QuestionStudent;
use yii\db\ActiveRecord;

/**
 * This is the ActiveQuery class for [[QuestionStudent]].
 *
 * @see QuestionStudent
 */
class QuestionStudentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return QuestionStudent[]|array
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
