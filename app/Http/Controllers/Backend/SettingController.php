<?php

namespace App\Http\Controllers\Backend;

use App\Constants\DirectoryConstant;
use App\Helpers\Functions;
use App\Services\UploadService;
use App\Setting;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;


class SettingController extends Controller
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
        $setting = Setting::first();

        return view('backend.setting._form',compact('setting'));
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
        $data = $request->except('_token');
        if ($request->logo != "null") {
            $url_thumb = $this->fileUpload->uploadImage1(DirectoryConstant::UPLOAD_FOLDER_LOGO,
                $request->logo);
            $data['logo'] = $url_thumb;
        }
        if ($request->favicon != "null") {
            $url_thumb = $this->fileUpload->uploadFiles(DirectoryConstant::UPLOAD_FOLDER_FAVICON,
                $request->favicon);
            $data['favicon'] = $url_thumb;
        }
        Setting::create($data);
        return redirect('/admin/setting');
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
        $setting = Setting::find($id);
        $data = $request->all();
        if ($request->hasFile('logo')) {
            $url_thumb = $this->fileUpload->uploadImage1(DirectoryConstant::UPLOAD_FOLDER_LOGO,
                $request->logo);
            $data['logo'] = $url_thumb;
            Functions::unlinkUpload(DirectoryConstant::UPLOAD_FOLDER_LOGO , $setting->logo);
        } else {
            unset($data['logo']);
        }

        if ($request->hasFile('favicon')) {
            $url_thumb = $this->fileUpload->uploadImage1(DirectoryConstant::UPLOAD_FOLDER_FAVICON,
                $request->favicon);
            $data['favicon'] = $url_thumb;
            Functions::unlinkUpload(DirectoryConstant::UPLOAD_FOLDER_FAVICON , $setting->favicon);
        } else {
            unset($data['favicon']);
        }

        $images_json = json_decode($request->images_json);
        $images = $request->images;

        if ($images && count($images)) {

            foreach ($images as $key => $item) {
                $request->merge(['file' => $item]);
                $validator = Validator::make($request->all(), ['file' => 'mimes:jpeg,jpg,png,gif|max:2048'], ['file.max' => 'File không quá 2MB']);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
            }

            foreach ($images as $key => $item) {
                $name=$item->getClientOriginalName();
                $url = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_LINK, $item);
                foreach($images_json as $image){
                    if(isset($image->fileName) && $image->fileName == $name){
                        $image->url = $url;
                        $image->new = false;
                    }
                }
            }
        }
        if(isset($request->images_delete)){
            $images_delete = json_decode($request->images_delete);
            foreach ($images_delete as $item) {
                Functions::unlinkUpload(DirectoryConstant::UPLOAD_FOLDER_LINK ,$item);
            }
        }
        $data = Arr::except($data, ['images_json','images_delete','images']);

        $setting->update($data);
        return redirect('/admin/setting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
