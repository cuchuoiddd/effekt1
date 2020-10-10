<?php

namespace App\Http\Controllers\Backend;

use App\Constants\DirectoryConstant;
use App\Helpers\Functions;
use App\Services\UploadService;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        dd($request->all());
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
