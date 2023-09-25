<?php

namespace common\models\query;

use common\models\Test;
use yii\db\ActiveRecord;

/**
 * This is the ActiveQuery class for [[\frontend\models\Test]].
 *
 * @see \common\models\Test
 */
class TestQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Test[]|array
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
