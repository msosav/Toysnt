<?php

namespace App\Util;

class ThirdPartyApi
{
    public function retrieveInfo($url): string
    {
        $response = file_get_contents($url);

        if ($response !== false) {
            return $response;
        } else {
            return "Failed to retrieve data from the API.";
        }
    }
}