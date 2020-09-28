<?php

namespace App\Http\Controllers\backend;

use App\Models\Source;
use App\Services\FanpageService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FanpageController extends Controller
{
    private $fanpage;

    public function __construct(FanpageService $fanpage)
    {
        $this->fanpage = $fanpage;
        $source = Source::pluck('name', 'id')->toArray();
        view()->share([
            'source' => $source,
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function index(Request $request)
    {
        $fanpages = $this->fanpage->index($request);
        if ($request->session()->has('login-facebook')) {
            $data_login_fb = $request->session()->get('login-facebook');
        } else {
            $data_login_fb = null;
        }
        return view('backend.marketing.fanpage.index', compact('fanpages', 'data_login_fb'));
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
        //
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
        $fanpage = $this->fanpage->update($request->all(), $id);
        return $fanpage;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
