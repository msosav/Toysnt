<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ImageStorage
{
    public function store(Request $request, string $image_type, string $id): string;

    public function delete(string $image_type, string $id);
}
