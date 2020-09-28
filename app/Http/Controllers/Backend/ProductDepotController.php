<?php

namespace App\Http\Controllers\Backend;

use App\Models\Depot;
use App\Models\Product;
use App\Models\ProductDepot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Constants\StatusCode;
use Illuminate\Support\Facades\Auth;
use App\Services\ProductDepostService;

class ProductDepotController extends Controller
{

    private $productDepost;

    public function __construct(ProductDepostService $productDepost)
    {
        $this->productDepost = $productDepost;
        $product = Product::pluck('name', 'id')->toArray();
        $deposts = Depot::pluck('name', 'id')->toArray();
        view()->share([
            'products' => $product,
            'deposts' => $deposts,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $docs = ProductDepot::search($request->all())->paginate(StatusCode::PAGINATE_20);
        if ($request->ajax()) {
            return view('backend.product_depot.ajax', compact('docs'));
        }

        return view('backend.product_depot.index', compact('docs'));
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
        $already = ProductDepot::search($request->all())->first();
        if (!empty($already))
//            return redirect(route('depots.product.index'))->with('waring', 'Sản phẩm đã tồn tại');
            return 0;
        $input = $request->all();
        $input['quantity'] = 0;
        $input['user_id'] = !empty(Auth::user()->id) ? Auth::user()->id : 0;
        $this->productDepost->create($input);
        return 1;
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
        $this->productDepost->delete($id);

        return 1;
    }
}
