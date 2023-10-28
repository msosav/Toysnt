<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Technique;
use App\Models\Toy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminReviewController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('admin.reviews.index');
        $viewData['reviews'] = Review::all();

        return view('admin.review.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $review = Review::find($id);

        if ($review === null) {
            return redirect()->route('admin.review.index');
        }

        if ($review->getToyId() == null) {
            $technique = Technique::find($review->getTechniqueId());
            $viewData = [];
            $viewData['review'] = $review;
            $viewData['title'] = $technique->getName() . ' review';

            return view('admin.review.show')->with('viewData', $viewData);
        } else {
            $toy = Toy::find($review->getToyId());
            $viewData = [];
            $viewData['review'] = $review;
            $viewData['title'] = $toy->getName() . ' review';

            return view('admin.review.show')->with('viewData', $viewData);
        }
    }

    public function create(): View
    {
        $techniques = Technique::all();
        $viewData = [];
        $viewData['title'] = trans('admin.reviews.create');
        $viewData['techniques'] = $techniques;

        return view('admin.review.create')->with('viewData', $viewData);
    }

    public function save(Request $request): View|RedirectResponse
    {
        $review = new Review();
        $review->setComment($request->input('comment'));
        $review->setRating($request->input('rating'));
        $review->setTechniqueId($request->input('technique'));
        $review->save();

        return redirect()->route('admin.review.index')->with('created', trans('admin.reviews.added'));
    }

    public function edit(string $id): View|RedirectResponse
    {
        $review = Review::find($id);
        $technique = Technique::find($review->getTechniqueId());
        $techniques = Technique::all();
        if ($review) {
            $viewData = [];
            $viewData['review'] = Review::find($id);
            $viewData['techniques'] = $techniques;
            $viewData['technique_name'] = $technique->getName();
            $viewData['title'] = $viewData['technique_name'] . ' review';

            return view('admin.review.edit')->with('viewData', $viewData);
        } else {

            return redirect()->route('admin.review.index');
        }
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $review = Review::find($id);
        if ($review === null) {
            return redirect()->route('admin.review.index');
        }

        $review->setComment($request->input('comment'));
        $review->setRating($request->input('rating'));
        $review->setTechniqueId($request->input('technique'));

        $review->update();

        return redirect()->route('admin.review.show', ['id' => $review->getId()])->with('edited', trans('admin.reviews.edited'));
    }

    public function delete(string $id): RedirectResponse
    {
        $review = Review::find($id);
        if ($review !== null) {
            Review::destroy($id);
        }

        return redirect()->route('admin.review.index')->with('deleted', trans('admin.reviews.deleted'));
    }
}
