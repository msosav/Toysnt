<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use App\Models\Technique;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminTechniqueController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('admin.techniques.index');
        $viewData['techniques'] = Technique::all();

        return view('admin.technique.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $technique = Technique::find($id);
        if ($technique) {
            $viewData = [];
            $viewData['technique'] = $technique;
            $viewData['title'] = $viewData['technique']->getModel();

            return view('admin.technique.show')->with('viewData', $viewData);
        } else {
            return redirect()->route('admin.technique.index');
        }
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = trans('admin.techniques.create');

        return view('admin.technique.create')->with('viewData', $viewData);
    }

    public function save(Request $request): View|RedirectResponse
    {
        Technique::validate($request);
        $technique = new Technique();
        $technique->setModel($request->input('model'));
        $image = app(ImageStorage::class);
        $image->store($request, 'technique_image', $technique->getModel());
        $technique->setImage($image->getImagePath());
        $technique->setPrice($request->input('price'));
        $technique->setDescription($request->input('description'));
        $technique->save();

        return redirect()->route('admin.technique.index')->with('created', trans('admin.techniques.added'));
    }

    public function edit(string $id): View|RedirectResponse
    {
        if (Technique::find($id) === null) {
            return redirect()->route('admin.technique.index');
        } else {
            $viewData = [];
            $viewData['technique'] = Technique::find($id);
            $viewData['title'] = $viewData['technique']->getModel();

            return view('admin.technique.edit')->with('viewData', $viewData);
        }
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        if (Technique::find($id) === null) {
            return redirect()->route('admin.technique.index');
        }

        Technique::validateUpdate($request);

        $technique = Technique::find($id);

        $technique->setModel($request->input('model'));
        if ($request->input('technique_image') != null) {
            $image = app(ImageStorage::class);
            $image->store($request, 'technique_image', $technique->getModel());
            $technique->setImage($image->getImagePath());
        }
        $technique->setPrice($request->input('price'));
        $technique->setDescription($request->input('description'));

        $technique->update();

        return redirect()->route('admin.technique.show', ['id' => $technique->getId()])->with('edited', trans('admin.techniques.edited'));
    }

    public function delete(string $id): RedirectResponse
    {
        if (Technique::find($id) !== null) {
            Technique::destroy($id);
        }

        return redirect()->route('admin.technique.index')->with('deleted', trans('admin.techniques.deleted'));
    }
}
