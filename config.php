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
    'vp' => [
        'service' => [
            'name' => 'Service Industries',
            'url' => 'http://www.youthguarantee.net.nz/vocational-pathways/the-six-vocational-pathways/service-industries-pathway/'
        ],
        'creative' => [
            'name' => 'Creative Industries',
            'url' => 'http://www.youthguarantee.net.nz/vocational-pathways/the-six-vocational-pathways/creative-industries-pathway/'
        ],
        'social' => [
            'name' => 'Social and Community Services',
            'url' => 'http://www.youthguarantee.net.nz/vocational-pathways/the-six-vocational-pathways/social-and-community-services-pathway/'
        ],
        'primary' => [
            'name' => 'Primary Industries',
            'url' => 'http://www.youthguarantee.net.nz/vocational-pathways/the-six-vocational-pathways/primary-industries-pathway/'
        ],
        'construction' => [
            'name' => 'Construction and Infrastructure',
            'url' => 'http://www.youthguarantee.net.nz/vocational-pathways/the-six-vocational-pathways/construction-and-infrastructure-pathway/'
        ],
        'manufacturing' => [
            'name' => 'Manufacturing and Technology',
            'url' => 'http://www.youthguarantee.net.nz/vocational-pathways/the-six-vocational-pathways/manufacturing-and-technology-pathway/'
        ],
    ],
    'services' => [
        'analytics' => 'UA-XXXXX-Y',
        'disqus' => '',
        'cloudinary' => 'whanganuihigh',
        'jumprock' => '',
    ],
    'navigation' => require_once('navigation.php'),

    'getTeachingFaculties' => function($page, $faculties) {
        return $faculties->filter(function($f){
            return $f->is_teaching_faculty ?? false;
        })->sortBy('title');
    },

    'getNonTeachingFaculties' => function($page, $faculties) {
        return $faculties->filter(function($f){
            return !($f->is_teaching_faculty ?? false);
        })->sortBy('title');
    },

    'getDepartmentStaff' => function($page, $faculties, $staff, $departmentToFind) {
        return $staff->filter(function($s) use ($departmentToFind){
            return in_array($departmentToFind, $s->departments);
        })
        ->filter(function($s) use ($faculties, $departmentToFind){
            $faculty = $faculties->firstWhere('title', $departmentToFind);
            return !( collect($faculty->hofs ?? [])->contains($s->title) or collect($faculty->ahofs ?? [])->contains($s->title));
        })
        ->sort(function($st, $other) use ($departmentToFind){

            return  
            (collect($st->positions ?? [])->firstWhere('department', $departmentToFind)['title'] ?? "ZZZZZZZZZZZZZZZZZZZZ")
             <=> 
             (collect($other->positions ?? [])->firstWhere('department', $departmentToFind)['title'] ?? "ZZZZZZZZZZZZZZZZZZZZ") 
            
             ?:

            implode(" ", array_reverse(explode(" ", $st->title)))
             <=> 
             implode(" ", array_reverse(explode(" ", $other->title)));
            
        });
    },

    'getDepartmentHofs' => function($page, $faculties, $staff, $departmentToFind) {
        return collect($faculties->firstWhere('title', $departmentToFind)->hofs ?? [])
                ->map(function($st) use ($staff){
                    return $staff->firstWhere('title', $st);
                });
    },
    'getDepartmentAHofs' => function($page, $faculties, $staff, $departmentToFind) {
        return collect($faculties->firstWhere('title', $departmentToFind)->ahofs ?? [])
                ->map(function($st) use ($staff){
                    return $staff->firstWhere('title', $st);
                });
    },

    'getFacultySubjectAreas' => function($page, $faculty, $subject_areas) {
        return $subject_areas   ->where('faculty', $faculty->title)
                                ->sortBy('title');
    },

    'getSubjectAreaCourses' => function($page, $subject_area, $courses) {
        return $courses ->where('subject_area', $subject_area->title);
    },

    'getSubjectAreaCoursesForLevel' => function($page, $subject_area, $courses, $level) {
        return $courses ->where('subject_area', $subject_area->title)
                        ->where('year', $level);
    },

    'getStaffMemberPositionsForDepartment' => function($page,$member,$department) {
        return  collect($member->positions ?? [])
                ->filter(function($p) use ($department){
                    return $p["department"] == $department->title;
                });
    },

    'yearLevelOffersVocationalPathways' => function($page, $level) {
        return in_array($level, ['11','12','13']);
    },

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
            'path' => 'courses/{code}',
            'sort' => ['year','course_level','name', 'code'],
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
            'is_teaching_faculty' => true,
            'isTeachingFaculty' => function($page, $faculty){
                return $faculty->is_teaching_faculty ?? false;
            }
        ],
        'for_parents' => [
            'path' => 'info-for-parents/{filename}',
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
            'path' => 'news/{-filename}',
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
        'school_documents',
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
        'extracurricular_areas' => [
            'path' => 'curriculum/extracurricular/{filename}',
            'extends' => '_layouts.extraCurricularArea',
            'section' => 'postContent'
        ],
        'extracurricular_activities',
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
