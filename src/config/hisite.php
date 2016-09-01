<?php

return [
    'components' => [
        'i18n' => [
            'translations' => [
                'hipanel/dns' => [
                    'class' => \yii\i18n\PhpMessageSource::class,
                    'basePath' => '@hipanel/modules/dns/messages',
                    'fileMap' => [
                        'hipanel/dns' => 'dns.php',
                    ],
                ],
            ],
        ],
    ],
];
