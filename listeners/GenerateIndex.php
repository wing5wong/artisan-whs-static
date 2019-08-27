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
                'type' => 'staff'
            ];
        })
        ->concat(collect($jigsaw->getCollection('news')->map(function ($page) use ($jigsaw) {
            return [
                'title' => $page->title,
                'link' => rightTrimPath($jigsaw->getConfig('baseUrl')) . $page->getPath(),
                'excerpt' => $page->excerpt(),
                'type' => 'news'
            ];
        })))
        ->values());
        file_put_contents($jigsaw->getDestinationPath() . '/index.json', json_encode($data));
    }
}