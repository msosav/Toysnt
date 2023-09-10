<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request, string $image_type, string $id): void
    {
        if ($request->hasFile($image_type)) {
            Storage::disk('public')->put(
                $image_type .  $id . '.jpg',
                file_get_contents($request->file($image_type)->getRealPath())
            );
        }
    }
}
