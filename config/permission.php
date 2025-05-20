<?php

return [
    'roles' => [
        'administrator' => [
            'name' => 'Администратор',
            'permissions' => ['*'],
        ],
        'editor' => [
            'name' => 'Редактор',
            'permissions' => ['create-post', 'edit-post', 'list-posts', 'view-post'],
        ],
        'user' => [
            'name' => 'Пользователь',
            'permissions' => ['list-posts', 'view-post', 'add-comment'],
        ],
    ],
];
