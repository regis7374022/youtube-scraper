<?php
namespace App\Providers;

/**
 * Created by PhpStorm.
 * User: roma
 * Date: 3/4/17
 * Time: 6:11 PM
 */
class YouTubeToMp3ConverterServiceProvider implements YouTubeConverterServiceProvider
{

    public function saveConvertedVideo($videoUrl)
    {
        $outputDestination = storage_path() . '/files';
        $outputFormat = 'mp3';
        $command = 'youtube-dl '
            . '--extract-audio '
            . '--audio-format=' . $outputFormat . ' '
            . '--output=' . $outputDestination . '/' . $videoUrl . '.' . $outputFormat . ' '
            . $videoUrl;

        $result = exec($command);

        return env('APP_URL') . '/mp3/' . $videoUrl . '.' . $outputFormat;
    }
}