<?php

namespace App\Http\Controllers\Backend;

use App\Constants\StatusConstant;
use App\Models\HistoryDepot;
use App\Models\Product;
use App\Models\ProductDepot;
use App\Models\Depot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Constants\StatusCode;
use Illuminate\Support\Facades\Auth;
use App\Services\ProductHistoryService;
use App\Services\ProductDepostService;

class HistoryDepotController extends Controller
{

    private $historyDepot;
    private $productDepot;

    public function __construct(ProductHistoryService $historyDepot, ProductDepostService $productDepot)
    {
        $this->historyDepot = $historyDepot;
        $this->productDepot = $productDepot;
        $product = Product::pluck('name', 'id')->prepend('Tất cả','')->toArray();
        $deposts = Depot::pluck('name', 'id')->toArray();
        $status = [
            StatusConstant::NHAP_KHO => 'Nhập kho',
            StatusConstant::XUAT_KHO => 'Xuất kho',
            StatusConstant::HONG_ROI => 'Hàng rơi, hỏng',
        ];

        view()->share([
            'products' => $product,
            'deposts' => $deposts,
            'status' => $status,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->except('name');
        $docs = HistoryDepot::search($input)->paginate(StatusCode::PAGINATE_20);
        if ($request->ajax()) {
            return view('backend.history_depot.ajax', compact('docs'));
        }

        return view('backend.history_depot.index', compact('docs'));
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
        $input = $request->except('product', 'quantity');

        if (count($request->product) && count($request->quantity)) {
            foreach ($request->product as $key => $item) {
                $input['product_id'] = $item;
                $input['user_id'] = !empty(Auth::user()->id) ? Auth::user()->id : 0;
                $doc = ProductDepot::search($input)->first();
                if (empty($request->quantity[$key]))
                    return redirect(route('depots.history.index'))->with('waring', 'Chưa điền số tiền');
                if ($input['status'] == StatusConstant::NHAP_KHO && !empty($request->quantity[$key])) {
                    $doc->quantity = $doc->quantity + (int)$request->quantity[$key];
                } elseif (in_array([StatusConstant::XUAT_KHO, StatusConstant::HONG_ROI], $input['status']) && !empty($request->quantity[$key])) {
                    $doc->quantity = $doc->quantity - (int)$request->quantity[$key];
                }
                $doc->save();
                $input['quantity_rest'] = $doc->quantity;
                $input['quantity'] = (int)$request->quantity[$key];
                $this->historyDepot->create($input);
            }

        }
        return redirect(route('depots.history.index'))->with('success', 'Thao tác thành công');
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
        $this->historyDepot->delete($id);

        return 1;
    }
}
