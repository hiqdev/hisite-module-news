<?php

$srcPath = dirname(__DIR__) . '/src';

return [
    'components' => [
        'themeManager' => [
            'pathMap' => [
                $srcPath . '/widgets/views' => '$themedWidgetPaths',
            ],
        ],
        'i18n' => [
            'translations' => [
                'hisite/news' => [
                    'class' => \yii\i18n\PhpMessageSource::class,
                    'basePath' => $srcPath . '/messages',
                    'fileMap' => [
                        'news' => 'news.php',
                    ],
                ],
            ],
        ],
    ],
];
