<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Item;
use App\Models\Toy;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    public function showBestSeller(): JsonResponse
    {
        $items = Item::all();
        $toyStats = [];
        foreach ($items as $item) {
            if ($item->getToyId() != null) {
                if (isset($toyStats[$item->getMethod()])) {
                    $toyStats[$item->getMethod()] += $item->getQuantity();
                } else {
                    $toyStats[$item->getMethod()] = $item->getQuantity();
                }
            }
        }
        arsort($toyStats);

        return response()->json($toyStats, 200);
    }
}
