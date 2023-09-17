<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request, string $image_type, string $id): string
    {
        if ($request->hasFile($image_type)) {
            Storage::disk('public')->put(
                $image_type.'_'.$id.'.jpg',
                file_get_contents($request->file($image_type)->getRealPath())
            );
        }

        return $image_type.'_'.$id.'.jpg';
    }

    public function delete(string $image_type, string $id)
    {
        if(Storage::disk('public')->exists($image_type.'_'.$id.'.jpg')){
            Storage::disk('public')->delete($image_type.'_'.$id.'.jpg');
        }
        
    }
}
