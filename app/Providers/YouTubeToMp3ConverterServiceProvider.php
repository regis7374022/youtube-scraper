<?php
namespace App\Providers;

/**
 * Created by PhpStorm.
 * User: roma
 * Date: 3/4/17
 * Time: 6:11 PM
 */
class YouTubeToMp3Converter implements YouTubeConverter
{

    public function saveConvertedVideo($videoUrl)
    {
        $outputDestination = '/home/splanger/projects/codelab/php/youtube-scraper/app/storage/files';
        $outputFormat = 'mp3';
        $command = 'youtube-dl '
            . '--extract-audio '
            . '--audio-format=' . $outputFormat . ' '
            . '--output=' . $outputDestination . '/' . $videoUrl . '.' . $outputFormat . ' '
            . $videoUrl;

        $result = exec($command);

        return 'http://localhost:8000/' . storage_path() . '/files/' . $videoUrl . '.' . $outputFormat;
    }
}