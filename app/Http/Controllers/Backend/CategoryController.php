<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::orderBy('position')->get();
        $parent = $data->pluck('title', 'id');
        $parent->prepend('Mặc định', '0');
        $nestable = view('backend.category._nestable',
            ['data' => $data])->render();
        return view('backend.category.index',compact('nestable', 'parent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category._form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title_vn' => 'required',
            'title_en' => 'required'
        ], [
            'title_vn.required' => 'Tên danh mục không được bỏ trống',
            'title_en.required' => 'Tên danh mục không được bỏ trống'
        ]);
        $data = $request->all();
        $cater = Category::find($data['id']);
        if (empty($cater)) {
            Category::create($data);
        } else {
            $cater->update($data);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json($category, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.index', compact('category'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Category::where('id',$id)->with('products')->first();
        if(count($cate->products)){
            return response()->json([
                'success' => false,
                'message' => 'Tồn tại sản phẩm, không được xóa !'
            ]);
        }else {
            $cate->delete();
        }
    }

    public function serialize(Request $request)
    {
        if (count($request->data)) {
            $this->updatePosition($request->data);
        }
        $request->session()->flash('status', 'Menu updated successfully!');
        return 1;
    }

    public function updatePosition($data)
    {
        foreach ($data as $key => $val) {
            $menu = Category::find($val['id']);
            if ($menu) {
                $menu->position = $key;
                $menu->save();
            }
        }
    }
}
