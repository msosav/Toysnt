<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Toy;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    public function showToys(): JsonResponse
    {
        $toys = Toy::all();

        return response()->json($toys, 200);
    }
}
