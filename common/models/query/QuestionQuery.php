<?php

namespace common\models\query;

use common\models\Question;
use yii\db\ActiveRecord;

/**
 * This is the ActiveQuery class for [[\frontend\models\Question]].
 *
 * @see \common\models\Question
 */
class QuestionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Question[]|array
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
