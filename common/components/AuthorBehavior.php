<?php

namespace common\components;

use yii\behaviors\AttributeBehavior;
use yii\db\BaseActiveRecord;

class AuthorBehavior extends AttributeBehavior
{
    public $fieldName = 'user_id';

    public function events()
    {
        return [
            BaseActiveRecord::EVENT_BEFORE_INSERT => 'insert',
            BaseActiveRecord::EVENT_BEFORE_UPDATE => 'insert',
        ];
    }

    public function insert()
    {
        $this->owner->{$this->fieldName} = \Yii::$app->user->getId();
    }
}