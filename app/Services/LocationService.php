<?php
/**
 * Created by PhpStorm.
 * User:
 * Date: 2019-06-25
 * Time: 10:59 AM
 */

namespace App\Services;

use App\Models\Location;
use App\Constants\Setting;

class LocationService
{
    public $location;

    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    public function searchAllLocation()
    {
        $cities = Location::where('parent_code', 0)->get();
        $districts = Location::where('parent_code', $cities[0]->code)->get();
        $wards = Location::where('parent_code', $districts[0]->code)->get();

        return array('cities' => $cities, 'districts' => $districts, 'wards' => $wards);
    }

    public function searchAllDistrict($city)
    {
        $districts = Location::where('parent_code', $city)->get();
        $wards = Location::where('parent_code', $districts[0]->code)->get();

        return (['districts' => $districts, 'wards' => $wards]);
    }

    public function searchAllWards($districts)
    {
        $wards = Location::where('parent_code', $districts)->get();

        return (['wards' => $wards]);
    }
    public function searchAllUseWards($ward)
    {
        $ward = Location::where('code',$ward)->first();
        $wards = Location::where('parent_code', $ward->parent_code)->with('parent')->get();
        $districts = Location::where('parent_code', $wards[0]->parent->parent_code)->get();
        $cities = Location::where('parent_code', 0)->get();
        return array('cities' => $cities, 'districts' => $districts, 'wards' => $wards);

    }

    public function locationMienBac()
    {
        $location_mien_bac = Location::whereBetween('id', Setting::LOCATION_MIEN_BAC)->get();

        return (['location_mien_bac' => $location_mien_bac]);
    }

    public function locationMienTrung()
    {
        $location_mien_trung = Location::whereBetween('id', Setting::LOCATION_MIEN_TRUNG)->get();

        return (['location_mien_trung' => $location_mien_trung]);
    }

    public function locationMienNam()
    {
        $location_mien_nam = Location::whereBetween('id', Setting::LOCATION_MIEN_NAM)->get();

        return (['location_mien_nam' => $location_mien_nam]);
    }


}
