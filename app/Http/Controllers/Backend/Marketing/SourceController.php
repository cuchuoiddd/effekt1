<?php

namespace App\Http\Controllers\Backend\Marketing;

use App\Constants\StatusCode;
use App\Models\Source;
use App\Services\Marketing\SourceService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SourceController extends Controller
{
    public $source;
    public  function __construct(SourceService $source)
    {
        $this->source = $source;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $source = $this->source->index()->paginate(StatusCode::PAGINATE_20);
        return view('backend.marketing.setting_connect.index',compact('source'));
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
        $data = $request->all();
        $data['product_id'] = json_encode($request->product_id);
        $data['sale_id'] = json_encode($request->sale_id);
        $data['user_id'] = Auth::user()->id;
        Source::create($data);
        return back();
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
        $data = $request->all();
        if($request->has('accept')){
            $data['accept'] = $request->accept == 'true' ? 1:0;
        }
        if($request->has('product_id')){
            $data['product_id'] = json_encode($request->product_id);
        }
        if($request->has('sale_id')){
            $data['sale_id'] = json_encode($request->sale_id);
        }
        $data['user_id'] = Auth::user()->id;
        $this->source->update($data,$id);

        //update ajax
        if($request->has('accept')){
            return 1;
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $source = $this->source->delete($id);
        if($source){
            $message = 'Đã xóa thành công !';
        } else {
            $message = 'Source đã được sử dụng không được xóa';
        }
        return response()->json([
            'success'    => $source,
            'message' => $message
        ]);
    }
}
