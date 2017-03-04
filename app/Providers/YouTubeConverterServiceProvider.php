<?php
namespace App\Providers;

/**
 * Created by PhpStorm.
 * User: roma
 * Date: 3/4/17
 * Time: 6:09 PM
 */
interface YouTubeConverter
{
    public function saveConvertedVideo($videoUrl);
}