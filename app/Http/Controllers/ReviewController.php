<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Technique;
use App\Models\Toy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller {
    public function save(Request $request, string $toyId=null, string $techniqueId=null, string $userId): View|RedirectResponse
    {
        if ($toyId == null && $techniqueId == null || $userId == null) {
            return redirect()->route('toy.index');
        }

        $review = new Review();
        $review->setComment($request->input('comment'));
        $review->setRating($request->input('rating'));
        $review->setTechnique_id($techniqueId);
        $review->setToy_id($toyId);
        $review->setUser_id($userId);
        $review->save();
    }
}