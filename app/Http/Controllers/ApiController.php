<?php

namespace App\Http\Controllers;

use App\Helper\ApiCallHelper;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getData(Request $request)
    {
        $url = 'http://devapi.hidoc.co:8080/TrendingPastCases/PastCases';

        $data = array(
            "action" => 'getTrendingCasesCP',
            "userId" => 586,
            "lastCount" => 0,
            "searchKeyword" => isset($request->searchKeyword)?$request->searchKeyword:''
        );

        $api_data = ApiCallHelper::api_call($url, $data);
        $data = json_decode($api_data, true);

        $data = isset($data['TotalCasesCP'])?$data['TotalCasesCP']:null; 

        return view('list', compact('data'));
    }

    
}

