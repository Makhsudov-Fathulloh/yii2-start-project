<?php

namespace frontend\models\query;

use frontend\models\QuestionStudent;

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
     * @return QuestionStudent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
