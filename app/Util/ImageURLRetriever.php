<?php

namespace App\Util;

use Google\Cloud\Storage\StorageClient;

class ImageURLRetriever
{
    public function getImageUrl(string $imageName): string
    {
        $storage = new StorageClient(['keyFile' => json_decode(env('GCP_KEY_FILE'), true)]);
        $bucket = $storage->bucket('images-toysnt');

        $object = $bucket->object($imageName);
        $url = $object->signedUrl(new \DateTime('+10 years'));

        return $url;
    }
}
