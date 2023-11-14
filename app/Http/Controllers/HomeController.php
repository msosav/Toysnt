<?php

namespace App\Http\Controllers;

use App\Models\Technique;
use App\Models\Toy;
use App\Util\ThirdPartyApi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $apiInstance = new ThirdPartyApi();
        $apiResponse = $apiInstance->retrieveInfo('http://ipwho.is/');
        $apiResponse = json_decode($apiResponse);
        $viewData = [];
        $viewData['title'] = trans('app.home.home');
        $toysGroup = Toy::stats();
        $viewData['toys'] = $toysGroup['stats'];
        $viewData['count'] = $toysGroup['count'];
        $viewData['techniques'] = Technique::stats();
        $viewData['apiIp'] = $apiResponse->ip;
        $viewData['apiCountry'] = $apiResponse->country;
        $viewData['apiCity'] = $apiResponse->city;

        return view('home.index')->with('viewData', $viewData);
    }

    public function changeLocale($locale): RedirectResponse
    {
        Session::put('locale', $locale);

        return redirect()->back();
    }
}
