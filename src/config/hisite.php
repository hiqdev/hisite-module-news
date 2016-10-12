<?php

return [
    'components' => [
        'themeManager' => [
            'pathMap' => [
                '@hisite/modules/news/widgets/views' => '$themedWidgetPaths',
//                '@hisite/modules/news/views' => '$themedViewPaths',
            ],
        ],
        'i18n' => [
            'translations' => [
                'hisite/news' => [
                    'class' => \yii\i18n\PhpMessageSource::class,
                    'basePath' => '@hisite/modules/news/messages',
                    'fileMap' => [
                        'news' => 'news.php',
                    ],
                ],
            ],
        ],
    ],
];
