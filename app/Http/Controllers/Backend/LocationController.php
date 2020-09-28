<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\LocationService;

class LocationController extends Controller
{

    private $locationService;

    /**
     * TaskController constructor.
     *
     * @param LocationService $locationService
     */
    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchAllLocation()
    {
        $data = $this->locationService->searchAllLocation();
        return response()->json($data);
    }

    public function searchAllDistrict($city)
    {
        $data = $this->locationService->searchAllDistrict($city);
        return response()->json($data);
    }

    public function searchAllWards($districts)
    {
        $data = $this->locationService->searchAllWards($districts);
        return response()->json($data);
    }
    public function searchAllUseWards($ward)
    {
        $data = $this->locationService->searchAllUseWards($ward);
        return response()->json($data);
    }

    public function locationMienBac()
    {
        $data = $this->locationService->locationMienBac();
        return response()->json($data);
    }

    public function locationMienTrung()
    {
        $data = $this->locationService->locationMienTrung();
        return response()->json($data);
    }

    public function locationMienNam()
    {
        $data = $this->locationService->locationMienNam();
        return response()->json($data);
    }


}
