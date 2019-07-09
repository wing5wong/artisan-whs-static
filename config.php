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
    'phone' => [
        'general' => ['display' => '(06) 349-0178', 'url'=> '06-3490178'],
        'attendance' => ['display' => '(06) 349-0177', 'url'=> '06-3490177'],
        'international' => ['display' => '+64-6-349-1181', 'url' => '+64-6-349-1181']
    ],
    'social' =>[
        'facebook' => 'https://www.facebook.com/WhanganuiHigh/',
        'youtube' => 'https://www.youtube.com/WanganuiHigh/',
        'twitter' => 'https://twitter.com/whanganuihigh',
    ],

    'services' => [
        'analytics' => 'UA-XXXXX-Y',
        'disqus' => '',
        'cloudinary' => 'whanganuihigh',
        'jumprock' => '',
    ],
    'navigation' => require_once('navigation.php'),
    'collections' => [
        'announcements' => [
            'path' => 'announcements/{filename}',
            'sort' => '-date',
            'extends' => '_layouts.post',
            'section' => 'postContent',
        ],
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
            'sort' => ['course_level', 'code'],
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
            'sort' => 'date',
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
            'sort' => 'title',
        ],
        'faculties' => [
            'sort' => 'title',
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
            'sort' => ['-date','title'],
            'extends' => '_layouts.post',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => false,
            'tags' => [],
            'excerpt' => function ($page, $limit = 250, $end = '...') {
                return $page->isPost
                    ? str_limit_soft(content_sanitize($page->getContent()), $limit, $end)
                    : null;
            },
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
            'extends' => '_layouts.subjectAreas',
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
        'term_dates',
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
