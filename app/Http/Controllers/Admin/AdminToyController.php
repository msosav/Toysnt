<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use App\Models\Toy;
use App\Util\ImageURLRetriever;
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
        $toy = Toy::find($id);

        if ($toy === null) {
            return redirect()->route('admin.toy.index');
        } else {
            $viewData = [];
            $viewData['toy'] = $toy;
            $viewData['title'] = $viewData['toy']->getName();

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
        Toy::validate($request, [], ['toy_image']);

        $toy = new Toy();
        $toy->setName($request->input('model'));
        $toy->setPrice($request->input('price'));
        $toy->setStock($request->input('stock'));
        $toy->setDescription($request->input('description'));
        $toy->setStorage($request->get('storage'));
        $toy->setImage('default');
        $toy->save();

        Toy::validate($request, ['toy_image'], []);

        $storage = $request->get('storage');

        $storeInterface = app(Imagestorage::class, ['storage' => $storage]);
        $imageName = $storeInterface->store($request, 'toy_image', $toy->getId());
        if ($storage == 'gcp') {
            $URLRetriever = new ImageURLRetriever();
            $url = $URLRetriever->getImageUrl($imageName);
            $toy->setImage($url);
        } elseif ($storage == 'local') {
            $toy->setImage($imageName);
        }
        $toy->update();

        return redirect()->route('admin.toy.index')->with('created', trans('admin.toys.added'));
    }

    public function edit(string $id): View|RedirectResponse
    {
        $toy = Toy::find($id);

        if ($toy === null) {
            return redirect()->route('admin.toy.index');
        } else {
            $viewData = [];
            $viewData['toy'] = $toy;
            $viewData['title'] = $viewData['toy']->getName();

            return view('admin.toy.edit')->with('viewData', $viewData);
        }
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $toy = Toy::find($id);

        if ($toy === null) {
            return redirect()->route('admin.toy.index');
        }

        Toy::validate($request, [], ['toy_image']);

        $toy->setName($request->input('model'));
        if ($request->input('toy_image') != null) {
            $image = app(ImageStorage::class);
            $image->store($request, 'toy_image', $toy->getName());
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
        $toy = Toy::find($id);

        if ($toy !== null) {
            $toy->delete();
        }

        return redirect()->route('admin.toy.index')->with('deleted', trans('admin.toys.deleted'));
    }
}
