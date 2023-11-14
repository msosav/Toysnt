<?php

namespace App\Http\Controllers;

use App\Models\Technique;
use App\Models\Toy;
use App\Util\ThirdPartyApi;
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
        $viewData['toys'] = Toy::stats();
        $viewData['techniques'] = Technique::stats();
        $viewData['apiIp'] = $apiResponse->ip;
        $viewData['apiCountry'] = $apiResponse->country;
        $viewData['apiCity'] = $apiResponse->city;

        return view('home.index')->with('viewData', $viewData);
    }

    public function changeLocale($locale)
    {
        Session::put('locale', $locale);

        return redirect()->back();
    }
}
