<?php

namespace common\components;

use yii\base\Module;

class Api extends Module
{
    public static array $apiRules = [
        'class' => 'yii\rest\UrlRule',
        'controller' => [
            'student',
            'teacher',
            'course',
            'course-student',
            'lesson',
            'lesson-student',
            'test',
            'question',
            'answer',
            'question-student',
            ],
        'pluralize' => false,
        'patterns' => [
            'GET' => 'index',
            'POST' => 'create',
            'PUT' => 'update',
            'DELETE' => 'delete'
        ],
    ];
}