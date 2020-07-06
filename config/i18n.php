<?php

$srcPath = dirname(__DIR__) . '/src';

return [
    'sourcePath' => $srcPath,
    'messagePath' => $srcPath . '/messages',
    'languages' => ['ru'],
    'removeUnused' => false,
    'markUnused' => false,
    'sort' => true,
    'ignoreCategories' => [
//        'app',
    ]
];
