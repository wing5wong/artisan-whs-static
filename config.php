<?php

return [
    'production' => false,
    'baseUrl' => 'https://www.whanganuihigh.school.nz',
    'site' => [
        'title' => 'Whanganui High School',
        'description' => 'An informative website about Whanganui High School',
        'image' => 'default-share.png',
    ],
    'owner' => [
        'name' => 'Whanganui High School',
        'twitter' => 'whanganuihigh',
        'github' => '',
    ],
    'services' => [
        'analytics' => 'UA-XXXXX-Y',
        'disqus' => '',
        'cloudinary' => 'whanganuihigh',
        'jumprock' => '',
    ],
    'collections' => [
        'about_whs' = [
            'path' => 'about_whs/{filename}',
            'sort' => 'date',
            'extends' => '_layouts.standard',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => false,
            'tags' => [],
        ],
        'posts' => [
            'path' => 'posts/{filename}',
            'sort' => '-date',
            'extends' => '_layouts.post',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => true,
            'tags' => [],
        ],
        'tags' => [
            'path' => 'tags/{filename}',
            'extends' => '_layouts.tag',
            'section' => '',
            'name' => function ($page) {
                return $page->getFilename();
            },
        ],
    ],
    'excerpt' => function ($page, $limit = 250, $end = '...') {
        return $page->isPost
            ? str_limit_soft(content_sanitize($page->getContent()), $limit, $end)
            : null;
    },
    'imageCdn' => function ($page, $path) {
        return "https://res.cloudinary.com/{$page->services->cloudinary}/{$path}";
    },
];
