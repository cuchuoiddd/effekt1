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
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    private $fileUpload;

    /**
     * UploadService constructor.
     *
     * @param UploadService $fileUpload
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
        $search['searchTitle'] = $request->searchTitle;
        $categories = Category::all();
        $products = Product::search($search)->paginate(StatusCode::PAGINATE_20);

        if ($request->ajax()){
            return view('backend.products.ajax', compact('products', 'categories'));
        }
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
        $rules = [
            'category_id' => 'required',
            'title_vn' => 'required',
            'title_en' => 'required',
            'content_vn' => 'required',
            'content_en' => 'required',
            'slug' => 'required'
        ];
        $messages = [
            'category_id.required' => 'Danh mục không được bỏ trống',
            'title_vn.required' => 'Tiêu đề VN không được bỏ trống',
            'title_en.required' => 'Tiêu đề EN không được bỏ trống',
            'content_vn.required' => 'Nội dung VN không được bỏ trống',
            'content_en.required' => 'Nội dung EN không được bỏ trống',
            'slug.required' => 'Slug không được bỏ trống'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
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
        $product->design_team = $product->design_team ? json_decode($product->design_team) : [];
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
