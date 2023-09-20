<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function new(): RedirectResponse
    {
        return redirect()->back()->with('newComment', 1);
    }

    public function save(Request $request, string $type, string $id): RedirectResponse
    {
        Review::validate($request);

        $review = new Review();
        $review->setComment($request->input('comment'));
        $review->setRating($request->input('rating'));
        if ($type == 'toy') {
            $review->setToyId($id);
            $review->setUserId(auth()->user()->id);
            $review->save();

            return redirect()->route('toy.show', ['id' => $id]);
        } elseif ($type == 'technique') {
            $review->setTechniqueId($id);
            $review->setUserId(auth()->user()->id);
            $review->save();

            return redirect()->route('technique.show', ['id' => $id]);
        } else {
            return redirect()->route('toy.index');
        }
    }
}
