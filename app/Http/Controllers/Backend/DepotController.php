<?php

namespace App\Http\Controllers\Backend;

use App\Services\ListDepotService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepotController extends Controller
{

    private $depot;

    public function __construct(ListDepotService $depot)
    {
        $this->depot = $depot;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depots = $this->depot->index();
        return view('backend.pages.depots.index',compact('depots'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->depot->create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->depot->update($request->all(),$id);
        return redirect(route('depots.list.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->depot->delete($id);
        return 1;
    }

    public function showDepot($id){
        $depot = $this->depot->show($id);
        return $depot->toArray();
    }
}
