<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use App\Models\Toy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminToyController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('admin.toys.index');
        $viewData['toys'] = Toy::all();

        return view('admin.toy.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        if (Toy::find($id) === null) {
            return redirect()->route('admin.toy.index');
        } else {
            $viewData = [];
            $viewData['toy'] = Toy::find($id);
            $viewData['title'] = $viewData['toy']->getModel();

            return view('admin.toy.show')->with('viewData', $viewData);
        }
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = trans('admin.toys.create');

        return view('admin.toy.create')->with('viewData', $viewData);
    }

    public function save(Request $request): View|RedirectResponse
    {
        Toy::validate($request);

        $toy = new Toy();
        $toy->setModel($request->input('model'));
        $image = app(ImageStorage::class);
        $image->store($request, 'toy_image', $toy->getModel());
        $toy->setImage($image->getImagePath());
        $toy->setPrice($request->input('price'));
        $toy->setStock($request->input('stock'));
        $toy->setDescription($request->input('description'));
        $toy->save();

        return redirect()->route('admin.toy.index')->with('created', trans('admin.toys.added'));
    }

    public function edit(string $id): View|RedirectResponse
    {
        if (Toy::find($id) === null) {
            return redirect()->route('admin.toy.index');
        } else {
            $viewData = [];
            $viewData['toy'] = Toy::find($id);
            $viewData['title'] = $viewData['toy']->getModel();

            return view('admin.toy.edit')->with('viewData', $viewData);
        }
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        if (Toy::find($id) === null) {
            return redirect()->route('admin.toy.index');
        }

        Toy::validateUpdate($request);

        $toy = Toy::find($id);

        $toy->setModel($request->input('model'));
        if ($request->input('toy_image') != null) {
            $image = app(ImageStorage::class);
            $image->store($request, 'toy_image', $toy->getModel());
            $toy->setImage($image->getImagePath());
        }
        $toy->setPrice($request->input('price'));
        $toy->setStock($request->input('stock'));
        $toy->setDescription($request->input('description'));

        $toy->update();

        return redirect()->route('admin.toy.show', ['id' => $toy->getId()])->with('edited', trans('admin.toys.edited'));
    }

    public function delete(string $id): RedirectResponse
    {
        if (Toy::find($id) !== null) {
            Toy::destroy($id);
        }

        return redirect()->route('admin.toy.index')->with('deleted', trans('admin.toys.deleted'));
    }
}
