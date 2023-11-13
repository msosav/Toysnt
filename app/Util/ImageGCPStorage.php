<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Http\Request;

class ImageGCPStorage implements ImageStorage
{
    public function store(Request $request, string $image_type, string $id): string
    {
        if ($request->hasFile($image_type)) {
            $gcpkeyFile = env('GCP_KEY_FILE');
            $storage = new StorageClient(['keyFile' => json_decode($gcpkeyFile, true)]);
            $bucket = $storage->bucket(env('GCP_BUCKET'));
            $gcpstoragePath = $image_type.'_'.$id.'.jpg';
            $bucket->upload(file_get_contents($request->file($image_type)->getRealPath()), [
                'name' => $gcpstoragePath, ]);

        }

        return $image_type.'_'.$id.'.jpg';
    }
}
