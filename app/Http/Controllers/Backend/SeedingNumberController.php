<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Functions;
use App\Models\SeedingNumber;
use App\Services\Marketing\SeedingNumberService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeedingNumberController extends Controller
{
    public $seeding;

    public function __construct(SeedingNumberService $seeding)
    {
        $this->seeding = $seeding;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->seeding->getAll();
        return view('backend.marketing.seeding_number.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->seeding_number;
        $data_replace = str_replace("\r\n", ';', $data);
        $arr_data = explode(';', $data_replace);
        if (count($arr_data)) {
            foreach ($arr_data as $item) {
                $check = SeedingNumber::where('seeding_number', $item)->first();
                if (!$check) {
                    SeedingNumber::create([
                        'seeding_number' => $item,
                        'user_id' => Functions::getUserId()
                    ]);
                }
            }
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SeedingNumber::find($id)->delete();
        return 1;
    }
}
