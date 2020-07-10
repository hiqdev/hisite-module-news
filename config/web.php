<?php

return [
    'components' => [
        'themeManager' => [
            'pathMap' => [
                dirname(__DIR__) . '/src/widgets/views' => '$themedWidgetPaths',
            ],
        ],
        'i18n' => [
            'translations' => [
                'hisite/news' => [
                    'class' => \yii\i18n\PhpMessageSource::class,
                    'basePath' => dirname(__DIR__) . '/src/messages',
                    'fileMap' => [
                        'news' => 'news.php',
                    ],
                ],
            ],
        ],
    ],
];
