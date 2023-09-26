<?php

namespace common\components;

use yii\base\Module;

class Api extends Module
{
    public static array $apiRules = [
        [
            'class' => 'yii\rest\UrlRule',
            'controller' => 'student',
            'pluralize' => false,
            'extraPatterns' => [
                'GET' => 'index',
                'POST' => 'create',
                'PUT <id:\d+>' => 'update',
                'DELETE <id:\d+>' => 'delete'
            ]
        ],

        [
            'class' => 'yii\rest\UrlRule',
            'controller' => 'teacher',
            'pluralize' => false,
            'patterns' => [
                'GET' => 'index',
                'POST' => 'create',
                'PUT <id:\d+>' => 'update',
                'DELETE <id:\d+>' => 'delete'
            ]
        ],

        [
            'class' => 'yii\rest\UrlRule',
            'controller' => 'course',
            'pluralize' => false,
            'patterns' => [
                'GET' => 'index',
                'POST' => 'create',
                'PUT <id:\d+>' => 'update',
                'DELETE <id:\d+>' => 'delete'
            ]
        ],

        [
            'class' => 'yii\rest\UrlRule',
            'controller' => 'course-student',
            'pluralize' => false,
            'patterns' => [
                'GET' => 'index',
                'POST' => 'create',
                'PUT <id:\d+>' => 'update',
                'DELETE <id:\d+>' => 'delete'
            ]
        ],

        [
            'class' => 'yii\rest\UrlRule',
            'controller' => 'lesson',
            'pluralize' => false,
            'patterns' => [
                'GET' => 'index',
                'POST' => 'create',
                'PUT <id:\d+>' => 'update',
                'DELETE <id:\d+>' => 'delete'
            ]
        ],

        [
            'class' => 'yii\rest\UrlRule',
            'controller' => 'lesson-student',
            'pluralize' => false,
            'patterns' => [
                'GET' => 'index',
                'POST' => 'create',
                'PUT <id:\d+>' => 'update',
                'DELETE <id:\d+>' => 'delete'
            ]
        ],

            [
            'class' => 'yii\rest\UrlRule',
            'controller' => 'test',
            'pluralize' => false,
            'patterns' => [
                'GET' => 'index',
                'POST' => 'create',
                'PUT <id:\d+>' => 'update',
                'DELETE <id:\d+>' => 'delete'
            ]
        ],

                [
            'class' => 'yii\rest\UrlRule',
            'controller' => 'question',
            'pluralize' => false,
            'patterns' => [
                'GET' => 'index',
                'POST' => 'create',
                'PUT <id:\d+>' => 'update',
                'DELETE <id:\d+>' => 'delete'
            ]
        ],

                [
            'class' => 'yii\rest\UrlRule',
            'controller' => 'answer',
            'pluralize' => false,
            'patterns' => [
                'GET' => 'index',
                'POST' => 'create',
                'PUT <id:\d+>' => 'update',
                'DELETE <id:\d+>' => 'delete'
            ]
        ],

                [
            'class' => 'yii\rest\UrlRule',
            'controller' => 'question-student',
            'pluralize' => false,
            'patterns' => [
                'GET' => 'index',
                'POST' => 'create',
                'PUT <id:\d+>' => 'update',
                'DELETE <id:\d+>' => 'delete'
            ]
        ],

    ];
}