<?php
namespace App\Listeners;
use TightenCo\Jigsaw\Jigsaw;
class GenerateIndex
{
    public function handle(Jigsaw $jigsaw)
    {
        $data = collect($jigsaw->getCollection('staff')->map(function ($page) use ($jigsaw) {
            return [
                'title' => $page->title,
                'link' => rightTrimPath($jigsaw->getConfig('baseUrl')) . $page->getPath(),
                'tags' => $page->tags,
                'type' => 'staff'
            ];
        })
        ->concat(collect($jigsaw->getCollection('news')->map(function ($news) use ($jigsaw) {
            return [
                'title' => $news->title,
                'link' => rightTrimPath($jigsaw->getConfig('baseUrl')) . $news->getPath(),
                'tags' => $news->tags,
                'excerpt' => $news->short(),
                'type' => 'news'
            ];
        })))
        ->values());
        file_put_contents($jigsaw->getDestinationPath() . '/index.json', json_encode($data));
    }
}