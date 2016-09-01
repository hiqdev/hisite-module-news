<?php

return [
    'components' => [
        'i18n' => [
            'translations' => [
                'hisite/news' => [
                    'class' => \yii\i18n\PhpMessageSource::class,
                    'basePath' => '@hipanel/modules/dns/messages',
                    'fileMap' => [
                        'hisite/news' => 'news.php',
                    ],
                ],
            ],
        ],
    ],
];
