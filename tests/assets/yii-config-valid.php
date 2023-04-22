<?php

use Proget\Tests\PHPStan\Yii2\Yii\MyActiveRecord;

return [
    'components' => [
        'customComponent' => [
            'class' => MyActiveRecord::class,
        ],
        'customInitializedComponent' => new MyActiveRecord(),
    ],
    'container' => [
        'singletons' => [
            'singleton-string' => MyActiveRecord::class,
            'singleton-closure' => function(): \SplStack {
                return new \SplStack();
            },
            'singleton-service' => ['class' => \SplObjectStorage::class],
        ],
        'definitions' => [
            'closure' => function(): \SplStack {
                return new \SplStack();
            },
            'service' => ['class' => \SplObjectStorage::class],
            MyActiveRecord::class => [
                'flag' => 'foo',
            ],
        ]
    ]
];
