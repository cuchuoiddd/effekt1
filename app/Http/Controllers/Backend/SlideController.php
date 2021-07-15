<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Functions;
use App\Slide;
use App\Constants\DirectoryConstant;
use App\Services\UploadService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SlideController extends Controller
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
    public function index()
    {
        $slide = Slide::all();
        return view('backend.slide.index',compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slide._form');
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
        if (!empty($request->image)) {
            $validator = Validator::make($request->all(), ['image' => 'max:10240'], ['file.max' => 'File không quá 10MB']);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $url_thumb = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_SLIDE,
                $request->image);
            $data['image'] = $url_thumb;
            Slide::create($data);
        }
        return redirect('/admin/slide');
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
        $slide = Slide::find($id);
        return view('backend.slide._form',compact('slide'));
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
        $slide = Slide::find($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $url_thumb = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_SLIDE,
                $request->image);
            $data['image'] = $url_thumb;
            Functions::unlinkUpload(DirectoryConstant::UPLOAD_FOLDER_SLIDE , $slide->image);
        } else {
            unset($data['image']);
        }
        $slide->update($data);
        return redirect('/admin/slide');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        if($slide->image){
            Functions::unlinkUpload(DirectoryConstant::UPLOAD_FOLDER_SLIDE , $slide->image);
        }
        $slide->delete();
        return 1;
    }
}
