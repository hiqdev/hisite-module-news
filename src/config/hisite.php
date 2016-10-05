<?php

return [
    'components' => [
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
