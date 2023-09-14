<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('admin.users.index');
        $viewData['users'] = User::all();
        $viewData['auth_user'] = auth()->user();

        return view('admin.user.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        if (User::find($id) === null) {
            return redirect()->route('admin.user.index');
        } else {
            $viewData = [];
            $viewData['user'] = User::find($id);
            $viewData['title'] = $viewData['user']->getName();
            $viewData['auth_user'] = auth()->user();

            return view('admin.user.show')->with('viewData', $viewData);
        }
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = trans('admin.users.create');
        $viewData['auth_user'] = auth()->user();

        return view('admin.user.create')->with('viewData', $viewData);
    }

    public function save(Request $request): View|RedirectResponse
    {
        User::validate($request);

        $user = new User();
        $user->setName($request->input('name'));
        $user->setPassword($request->input('password'));
        $user->setEmail($request->input('email'));
        $user->setAddress($request->input('address'));
        $user->setRole($request->input('role'));
        $user->setBalance($request->input('balance'));
        $user->save();

        return redirect()->route('admin.user.index')->with('created', trans('admin.users.added'));
    }

    public function edit(string $id): View|RedirectResponse
    {
        if (User::find($id) === null) {
            return redirect()->route('admin.user.index');
        } else {
            $viewData = [];
            $viewData['user'] = User::find($id);
            $viewData['title'] = $viewData['user']->getName();
            $viewData['auth_user'] = auth()->user();

            return view('admin.user.edit')->with('viewData', $viewData);
        }
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        if (User::find($id) === null) {
            return redirect()->route('admin.user.index');
        }

        User::validateUpdate($request);

        $user = User::find($id);
        $user->setName($request->input('name'));
        $user->setEmail($request->input('email'));
        $user->setAddress($request->input('address'));
        $user->setRole($request->input('role'));
        $user->setBalance($request->input('balance'));
        $user->update();

        return redirect()->route('admin.user.show', ['id' => $user->getId()])->with('edited', trans('admin.users.edited'));
    }

    public function delete(string $id): RedirectResponse
    {
        if (User::find($id) !== null) {
            User::destroy($id);
        }

        return redirect()->route('admin.user.index')->with('deleted', trans('admin.users.deleted'));
    }
}
