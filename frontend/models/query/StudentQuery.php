<?php

namespace frontend\models\query;

use frontend\models\Student;

/**
 * This is the ActiveQuery class for [[\frontend\models\Student]].
 *
 * @see Student
 */
class StudentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Student[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Student|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
