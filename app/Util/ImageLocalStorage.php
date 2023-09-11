<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    private string $image_path;

    public function store(Request $request, string $image_type, string $model): void
    {
        if ($request->hasFile($image_type)) {
            Storage::disk('public')->put(
                $model.'.jpg',
                file_get_contents($request->file($image_type)->getRealPath())
            );
        }

        $this->image_path = $model.'.jpg';
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}
