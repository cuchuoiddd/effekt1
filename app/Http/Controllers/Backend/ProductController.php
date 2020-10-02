<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Constants\DirectoryConstant;
use App\Constants\StatusCode;
use App\People;
use App\Product;
use App\Helpers\Functions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UploadService;
use Illuminate\Support\Arr;


class ProductController extends Controller
{

    private $fileUpload;

    /**
     * UploadService constructor.
     *
     * @param Filesystem $fileUpload
     */
    public function __construct(UploadService $fileUpload)
    {
        $this->fileUpload = $fileUpload;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::paginate(StatusCode::PAGINATE_20);
        return view('backend.products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $people = People::all();
        return view('backend.products._form', compact('categories','people'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $images = $request->images;
        if ($images && count($images)) {
            $arr_images = [];
            foreach ($images as $key => $item) {
                $url = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_PRODUCT, $item);
                $arr_images[$key]['url'] = $url;
            }
            $data['images'] = json_encode($arr_images);
        } else {
            $data['images'] = '';
        }
        $data = Arr::except($data, 'images_json');
        Product::create($data);
        return redirect('/admin/work/products');
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
//        dd($id);
        $product = Product::find($id);
        $categories = Category::all();
        $people = People::all();
        return view('backend.products._form', compact('product', 'categories','people'));
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
        $data = $request->all();

        $product = Product::find($id);

        $arr_image_not_delete = [];

        if ($request->images_json != '') {
            $images_json = json_decode($request->images_json);

            $arr_image_not_delete = self::checkImageNotDelete($images_json);
        }


        $arr_image_not_delete_map = collect($arr_image_not_delete) -> map(function ($item) {
            return str_replace('/backend/images/products/','',$item['url']);
        });
        $arr_image_not_delete_map = $arr_image_not_delete_map->toArray();

        if ($product->images != '') {
            $images_old = collect(json_decode($product->images));
            $images_old = $images_old->map(function($item){
                return $item->url;
            })->toArray();
            foreach ($images_old as $item) {
                if (in_array($item, $arr_image_not_delete_map)) {
                } else {
                    Functions::unlinkUpload(DirectoryConstant::UPLOAD_FOLDER_PRODUCT ,$item);
                    Functions::unlinkUpload(DirectoryConstant::UPLOAD_FOLDER_PRODUCT_THUMB ,$item);
                }
            }
        }


        $arr_image_not_delete = collect($arr_image_not_delete)->map(function($item){
            return  str_replace('/backend/images/products/','',$item);
        });

        $images = $request->images;

        if ($images && count($images)) {
            $arr_images = [];
            foreach ($images as $key => $item) {
                $url = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_PRODUCT, $item);
                $arr_images[$key]['url'] = $url;
            }
            $data['images'] = json_encode($arr_image_not_delete->merge($arr_images));
        } else {
            $data['images'] = json_encode($arr_image_not_delete);
        }
        if($request->design_team){
            $data['design_team'] = json_encode($request->design_team);
        }
        $data = Arr::except($data, 'images_json');
        $product->update($data);
        return redirect('/admin/work/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product->images != ''){
            $images = json_decode($product->images);

            foreach ($images as $item) {
                Functions::unlinkUpload(DirectoryConstant::UPLOAD_FOLDER_PRODUCT ,$item->url);
                Functions::unlinkUpload(DirectoryConstant::UPLOAD_FOLDER_PRODUCT_THUMB ,$item->url);
            }
        }
        $product->delete();
    }

    //get arr image không xóa
    public function checkImageNotDelete($image_json)
    {
        $result = [];
        foreach ($image_json as $key => $item) {
            if (isset($item->url) && !isset($item->fileName)) {
                $result[]['url'] = $item->url;
            }
        }
        return $result;
    }
}
