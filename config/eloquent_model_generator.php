<?php

return [
    'model_defaults' => [
        'namespace'       => 'App\Models',
        'base_class_name' => \Illuminate\Database\Eloquent\Model::class,
        'output_path'     => 'Models',
        'backup'          => true,
    ],
    'db_types' => [
        'enum' => 'string',
    ]
];