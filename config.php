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
        'general' => ['display' => '(06) 349-0178', 'url' => '06-3490178'],
        'attendance' => ['display' => '(06) 349-0177', 'url' => '06-3490177'],
        'international' => ['display' => '+64-6-349-1181', 'url' => '+64-6-349-1181']
    ],
    'social' => [
        'facebook' => 'https://www.facebook.com/WhanganuiHigh/',
        'youtube' => 'https://www.youtube.com/WanganuiHigh/',
        'twitter' => 'https://twitter.com/whanganuihigh',
    ],
    'vp' => [
        'service' => [
            'name' => 'Service Industries',
            'url' => 'http://www.youthguarantee.net.nz/vocational-pathways/the-six-vocational-pathways/service-industries-pathway/',
            'code' => 'S',
        ],
        'creative' => [
            'name' => 'Creative Industries',
            'url' => 'http://www.youthguarantee.net.nz/vocational-pathways/the-six-vocational-pathways/creative-industries-pathway/',
            'code' => 'C',
        ],
        'social' => [
            'name' => 'Social and Community Services',
            'url' => 'http://www.youthguarantee.net.nz/vocational-pathways/the-six-vocational-pathways/social-and-community-services-pathway/',
            'code' => 'SC',
        ],
        'primary' => [
            'name' => 'Primary Industries',
            'url' => 'http://www.youthguarantee.net.nz/vocational-pathways/the-six-vocational-pathways/primary-industries-pathway/',
            'code' => 'P',
        ],
        'construction' => [
            'name' => 'Construction and Infrastructure',
            'url' => 'http://www.youthguarantee.net.nz/vocational-pathways/the-six-vocational-pathways/construction-and-infrastructure-pathway/',
            'code' => 'CI',
        ],
        'manufacturing' => [
            'name' => 'Manufacturing and Technology',
            'url' => 'http://www.youthguarantee.net.nz/vocational-pathways/the-six-vocational-pathways/manufacturing-and-technology-pathway/',
            'code' => 'MT',
        ],
    ],
    'services' => [
        'analytics' => 'UA-XXXXX-Y',
        'disqus' => '',
        'cloudinary' => 'whanganuihigh',
        'jumprock' => '',
    ],
    'navigation' => require_once('navigation.php'),

    'getTeachingFaculties' => function ($page, $faculties) {
        return $faculties->filter(function ($f) {
            return $f->is_teaching_faculty ?? false;
        })->sortBy('title');
    },

    'getNonTeachingFaculties' => function ($page, $faculties) {
        return $faculties->filter(function ($f) {
            return !($f->is_teaching_faculty ?? false);
        })->sortBy('title');
    },

    'getDepartmentStaff' => function ($page, $faculties, $staff, $departmentToFind) {
        return $staff->filter(function ($s) use ($departmentToFind) {
            return collect($s->departments ?? [])->contains($departmentToFind);
        })
            ->filter(function ($s) use ($faculties, $departmentToFind) {
                $faculty = $faculties->firstWhere('title', $departmentToFind);
                return !(collect($faculty->hofs ?? [])->contains($s->title) or collect($faculty->ahofs ?? [])->contains($s->title));
            })
            ->sort(function ($st, $other) use ($departmentToFind) {

                return (collect($st->positions ?? [])->firstWhere('department', $departmentToFind)['title'] ?? "ZZZZZZZZZZZZZZZZZZZZ")
                    <=>
                    (collect($other->positions ?? [])->firstWhere('department', $departmentToFind)['title'] ?? "ZZZZZZZZZZZZZZZZZZZZ")

                    ?:

                    implode(" ", array_reverse(explode(" ", $st->title)))
                    <=>
                    implode(" ", array_reverse(explode(" ", $other->title)));
            });
    },

    'getDepartmentHofs' => function ($page, $faculties, $staff, $departmentToFind) {
        return collect($faculties->firstWhere('title', $departmentToFind)->hofs ?? [])
            ->map(function ($st) use ($staff) {
                return $staff->firstWhere('title', $st);
            })->filter(function($st){
                return !is_null($st);
            });
    },
    'getDepartmentAHofs' => function ($page, $faculties, $staff, $departmentToFind) {
        return collect($faculties->firstWhere('title', $departmentToFind)->ahofs ?? [])
            ->map(function ($st) use ($staff) {
                return $staff->firstWhere('title', $st);
            })->filter(function($st){
                return !is_null($st);
            });
    },

    'getFacultySubjectAreas' => function ($page, $faculty, $subject_areas) {
        return $subject_areas->where('faculty', $faculty->title)
            ->sortBy('title');
    },

    'getSubjectAreaCourses' => function ($page, $subject_area, $courses) {
        return $courses->where('subject_area', $subject_area->title)->sortBy('name')->sortBy('year');
    },

    'getFacultyCoursesForLevel' => function ($page, $faculty, $subject_areas, $courses, $level) {
        return $subject_areas->where('faculty', $faculty->title)
            ->flatMap(function ($subject) use ($courses, $level) {
                return $courses->where('subject_area', $subject->title)
                    ->where('year', $level)
                    ->concat(
                        $courses->where('subject_area', $subject->title)
                            ->where('course_level', "All Year Levels")
                    )->unique();
            })
            ->sortBy('name');
    },


    'getSubjectAreaCoursesForLevel' => function ($page, $subject_area, $courses, $level) {
        return $courses->where('subject_area', $subject_area->title)
            ->where('year', $level)
            ->concat(
                $courses->where('subject_area', $subject_area->title)
                    ->where('course_level', "All Year Levels")
            )
            ->sortBy('name');
    },

    'getStaffMemberPositionsForDepartment' => function ($page, $member, $departmentName) {
        return  collect($member->positions ?? [])
            ->filter(function ($p) use ($departmentName) {
                return $p["department"] == $departmentName;
            });
    },

    'yearLevelOffersVocationalPathways' => function ($page, $level) {
        return in_array($level, ['11', '12', '13']);
    },

    'collections' => [
        'announcements' => [
            'path' => 'announcements/{filename}',
            'sort' => '-date',
            'extends' => '_layouts.post',
            'section' => 'postContent',
        ],
        'pages' => [
            'path' => '{filename}',
            'extends' => '_layouts.page',
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
        'assessments' => [
            'sort' => 'title',
        ],
        'about' => [
            'path' => 'about-whs/{filename}',
            'sort' => '-date',
            'extends' => '_layouts.post',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => true,
            'tags' => [],
            'isVisible' => function ($page) {
                return !($page->visible == "No");
            }
        ],
        'board_members',
        'courses' => [
            'path' => 'courses/{code}',
            'sort' => ['year', 'course_level', 'name', 'code'],
            'extends' => '_layouts.course',
            'section' => 'postContent',
            'getAvailableCredits' => function ($page, $assessments) {
                if ($page->credits) {
                    return $page->credits;
                }
                if ($page->standards) {
                    return "up to " . collect($page->standards)->map(function ($standard) use ($assessments) {
                        return $assessments->firstWhere('title', $standard);
                    })->reduce(function ($carry, $standard) {
                        return $carry + intval($standard->credits);
                    }, 0);
                }

                return "up to " . $assessments->filter(function ($standard) use ($page) {
                    return collect($standard->categories)->contains($page->title);
                })->reduce(function ($carry, $standard) {
                    return $carry + intval($standard->credits);
                }, 0);
            }
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
            'extends' => '_layouts.event',
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
            'isTeachingFaculty' => function ($page, $faculty) {
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
        'galleries' => [
            'path' => 'galleries/{filename}',
            'sort' => 'faculty',
            'extends' => '_layouts.gallery',
            'section' => 'postContent'
        ],
        'honours' => [
            'sort' => ['award', '-date']
        ],
        'prizegiving_booklets' => ['sort' => '-date'],
        'achievers_lists' => ['sort' => '-date'],
        'testimonials',

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
            'sort' => ['-publishedDate', 'title'],
            'extends' => '_layouts.post',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => false,
            'tags' => [],
            'show_in_slider' => true,
            'test' => function ($page, $limit = 200, $end = '...') {
                return $page->isPost
                    ? ($page->short ?? str_limit_soft(content_sanitize($page->getContent()), $limit, $end))
                    : null;
            },
            'publishedDate' => function ($page) {
                return $page->news_author["date"] ?? $page->date;
            }
        ],
        'career_news' => [
            'path' => 'career-and-vocational-news/{-filename}',
            'sort' => ['-publishedDate', 'title'],
            'extends' => '_layouts.vocational-news',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => false,
            'tags' => [],
            'show_in_slider' => true,
            'test' => function ($page, $limit = 200, $end = '...') {
                return $page->isPost
                    ? ($page->short ?? str_limit_soft(content_sanitize($page->getContent()), $limit, $end))
                    : null;
            },
            'publishedDate' => function ($page) {
                return $page->news_author["date"] ?? $page->date;
            }
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
        'school_leaders',
        'school_documents',
        'the_record' => [
            'sort' => ['-date', 'title'],
        ],
        'scholarships' => [
            'path' => 'scholarships/{filename}',
            'extends' => '_layouts.post',
            'section' => 'postContent'
        ],
        'staff' => [
            'section' => 'postContent',
            'tags' => [],
            'phone' => '',
            'email' => ''
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
        'extracurricular_activities' => [
            'extends' => '_layouts.extraCurricularActivity',
            'section' => 'postContent'
        ],
        'term_dates' => [
            'sort' => 'date'
        ],
        'vacancies',
    ],
    'imageCdn' => function ($page, $path) {
        return "https://res.cloudinary.com/{$page->services->cloudinary}/{$path}";
    },
    'featureImageSrc' => function ($page, $item = null) {
        if (!$item) $item = $page;
        if($item->feature_image && array_key_exists('image', $item->feature_image)){
            return $item->feature_image["image"];
        }
        return $item->image ?: '';
    },
    'featureImageDescription' => function ($page, $item = null) {
        if (!$item) $item = $page;
        if($item->feature_image && array_key_exists('description', $item->feature_image)){
            return $item->feature_image["description"];
        }
        return $item->image_title;
    },
    'featureImageAlt' => function ($page, $item = null) {
        if (!$item) $item = $page;
        if($item->feature_image && array_key_exists('alt', $item->feature_image)){
            return $item->feature_image["alt"];
        }
        return $item->image_alt;
    },
    'featureImageCredit' => function ($page, $item = null) {
        if (!$item) $item = $page;
        if($item->feature_image && array_key_exists('credit', $item->feature_image)){
            return $item->feature_image["credit"];
        }
        return $item->image_credit;
    },
];
