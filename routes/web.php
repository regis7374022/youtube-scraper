<?php
use App\Providers;


Route::get('/api/youtube2mp3/{videoId}', function ($videoId) {

    $youTubeConverter = new Providers\YouTubeToMp3ConverterServiceProvider();

    $response = [
        "video_id" => $videoId,
        "download_url" => $youTubeConverter->saveConvertedVideo($videoId)
    ];

    return json_encode($response, JSON_UNESCAPED_SLASHES);
});


Route::get('/mp3/{downloadId}', function ($downloadId) {

    // Check if file exists in app/storage/files folder
    $file_path = storage_path() .'/files/'. $downloadId;
    if (file_exists($file_path))
    {
        // Send Download
        return Response::download($file_path, $downloadId, [
            'Content-Length: '. filesize($file_path)
        ]);
    }
    else
    {
        // Error
        exit('Requested file does not exist on our server!');
    }

});
