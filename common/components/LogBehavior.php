<?php

namespace common\components;

use common\models\Log;
use yii\base\Behavior;
use yii\db\BaseActiveRecord;

class LogBehavior extends Behavior
{
    public function events()
    {
        return [
            BaseActiveRecord::EVENT_BEFORE_UPDATE => 'log'

        ];
    }

    public function log()
    {
        $oldAttributes = $this->owner->getOldAttributes();

        $newAttributes = $this->owner->getAttributes();

        $modelClass = get_class($this->owner);

        $log = new Log();
        $log->user_id = \Yii::$app->user->id;
        $log->old_value = json_encode($oldAttributes);
        $log->new_value = json_encode($newAttributes);
        $log->model_class = $modelClass;
        $log->created_at = time();
        $log->updated_at = time();
        $log->save();
    }
}