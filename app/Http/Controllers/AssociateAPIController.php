<?php

namespace App\Http\Controllers;

use App\Util\ThirdPartyApi;
use Illuminate\View\View;

class AssociateAPIController extends Controller
{
    public function index(): View
    {
        $apiInstance = new ThirdPartyApi();
        $apiResponse = $apiInstance->retrieveInfo('http://www.miguapamundi.tech/public/api/countries-in-offer');
        $apiResponse = json_decode($apiResponse, true);
        $viewData = [];
        $viewData['apiData'] = $apiResponse;

        return view('associate.index')->with('viewData', $viewData);
    }
}
