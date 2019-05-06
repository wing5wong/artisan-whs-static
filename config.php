<?php

return [
    'production' => false,
    'baseUrl' => 'http://localhost:3000',
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
        'announcements',
        'pages' => [
            'path' => !empty('{customPath}') ?: '{filename}',
            'extends' => '_layouts.post',
            'section' => 'postContent',
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
        'assessments',
        'about' => [
            'path' => 'about-whs/{filename}',
            'sort' => '-date',
            'extends' => '_layouts.post',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => true,
            'tags' => [],
            'isVisible'=> function($page){
                return !($page->visible == "No");
            }
        ],
        'board_members',
        'courses' => [
            'extends' => '_layouts.course',
            'section' => 'postContent',
        ],
        'curriculum' => [
            'path' => 'curriculum/{filename}',
            'sort' => '-date',
            'extends' => '_layouts.post',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => true,
            'tags' => [],
        ],
        'events' => [
            'path' => 'events/{filename}',
            'sort' => '-date',
            'extends' => '_layouts.post',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => false,
            'tags' => [],
        ],
        'facilities' => [
            'path' => 'facilities/{filename}',
            'extends' => '_layouts.post',
            'section' => 'postContent',
            'tags' => [],
        ],
        'faculties' => [
            'extends' => '_layouts.faculty',
            'section' => 'postContent',
        ],
        'for_parents' => [
            'path' => 'for-parents/{filename}',
            'sort' => '-date',
            'extends' => '_layouts.post',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => true,
            'tags' => [],
        ],
        'honours' => [
            'sort' => '-date'
        ],
        'international' => [
            'path' => 'international/{filename}',
            'sort' => '-date',
            'extends' => '_layouts.post',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => true,
            'tags' => [],
        ],
        'news' => [
            'path' => 'news/{filename}',
            'sort' => '-date',
            'extends' => '_layouts.post',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => false,
            'tags' => [],
        ],
        'news_and_events' => [
            'path' => 'news-and-events/{filename}',
            'sort' => '-date',
            'extends' => '_layouts.post',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => true,
            'tags' => [],
        ],
        'newsletters',
        'policies' => [
            'isPost' => false,
            'comments' => false,
            'tags' => [],
        ],
        'prefects',
        'staff' => [
            'section' => 'postContent',
            'tags' => [],
        ],
        'subject_areas' => [
            'path' => 'subject-areas/{filename}',
            'extends' => '_layouts.post',
            'section' => 'postContent'
        ],
        'tags' => [
            'path' => 'tags/{filename}',
            'extends' => '_layouts.tag',
            'section' => '',
            'name' => function ($page) {
                return $page->getFilename();
            },
        ],
        'vacancies',
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
