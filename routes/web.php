<?php

Route::get('/api/youtube2mp3/{videoId}', function ($videoId) {

    $outputDestination = '/home/splanger/projects/codelab/php/youtube-scraper/public/mp3';
    $outputFormat = 'mp3';
    $command = 'youtube-dl '
        . '--extract-audio '
        . '--audio-format=' . $outputFormat . ' '
        . '--output=' . $outputDestination . '/' . $videoId . '.' . $outputFormat . ' '
        . $videoId;

    $result = exec($command);

    $response = [
        "video_id" => $videoId,
        "download_url" => 'localhost:8000/mp3/' . $videoId . '.' . $outputFormat
    ];

    return json_encode($response);
});
