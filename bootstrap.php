<?php

// @var $container \Illuminate\Container\Container
// @var $events \TightenCo\Jigsaw\Events\EventBus

/*
 * You can run custom code at different stages of the build process by
 * listening to the 'beforeBuild', 'afterCollections', and 'afterBuild' events.
 *
 * For example:
 *
 * $events->beforeBuild(function (Jigsaw $jigsaw) {
 *     // Your code here
 * });
 */

// $events->afterBuild(App\Listeners\GenerateSitemap::class);
// $events->afterBuild(App\Listeners\GenerateIndex::class);


function media($path)
{
    $cloudName = $GLOBALS['container']->config['services']['cloudinary']['cloudName'];
    return "https://res.cloudinary.com/{$cloudName}/{$path}";
}

function content_sanitize($value)
{
    return str_replace(["\r", "\n", "\r\n", '  '], ' ', strip_tags($value) ?? '');
}

function str_limit_soft($value, $limit = 100, $end = '...')
{
    if (mb_strlen($value, 'UTF-8') <= $limit) {
        return $value;
    }

    return rtrim(strtok(wordwrap($value, $limit, "\n"), "\n"), ' .') . $end;
}