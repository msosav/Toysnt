<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function technique(): RedirectResponse
    {
        return redirect()->route('review.technique');
    }

    public function toy(): RedirectResponse
    {
        return redirect()->back()->with('newComment', 1);
    }

    public function save(Request $request, string $toyId = null, string $techniqueId= null): RedirectResponse
    {
        Review::validate($request);

        $review = new Review();
        $review->setComment($request->input('comment'));
        $review->setRating($request->input('rating'));
        if ($toyId !== null) {
            $review->setToyId($toyId);
            $review->setUserId(auth()->user()->id);
            $review->save();
            return redirect()->route('toy.show', ['id' => $toyId]);
        }
        if ($techniqueId !== null) {
            $review->setTechniqueId($techniqueId);
            $review->setUserId(auth()->user()->id);
            return redirect()->route('technique.show', ['id' => $techniqueId]);
        }
    }
}
