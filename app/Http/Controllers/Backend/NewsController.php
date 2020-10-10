<?php

namespace App\Http\Controllers\Backend;

use App\Constants\DirectoryConstant;
use App\Constants\StatusCode;
use App\Helpers\Functions;
use App\News;
use App\Services\UploadService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search['searchTitle'] = $request->searchTitle;
        $news = News::search($search)->paginate(StatusCode::PAGINATE_20);
        if ($request->ajax()){
            return view('backend.news.ajax', compact('news'));
        }
        return view('backend.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.news._form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title_vn' => 'required',
            'content_vn' => 'required',
            'image' => 'required'
        ];
        $messages = [
            'title_vn.required' => 'Tiêu đề không được bỏ trống',
            'content_vn.required' => 'Nội dung không được bỏ trống',
            'image.required' => 'Hình ảnh không được bỏ trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->except('_token');
        if ($request->image != "null") {
            $url_thumb = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_NEW,
                $request->image);
            $data['image'] = $url_thumb;
        }
        News::create($data);
        return redirect('/admin/news');
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
        $news = News::find($id);
        return view('backend.news._form',compact('news'));
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
        $news = News::find($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $url_thumb = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_NEW,
                $request->image);
            $data['image'] = $url_thumb;
            Functions::unlinkUpload(DirectoryConstant::UPLOAD_FOLDER_NEW , $news->image);
        } else {
            unset($data['image']);
        }
        $news->update($data);
        return redirect('/admin/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->delete();
        return 1;
    }
}
