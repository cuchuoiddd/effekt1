<?php

namespace App\Http\Controllers\Backend;

use App\Constants\DirectoryConstant;
use App\Helpers\Functions;
use App\Office;
use App\Services\UploadService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class OfficeController extends Controller
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
        $office = Office::first();
        return view('backend.offices._form',compact('office'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.offices._form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('image_profile','images_json','image_people','image_employment','image_award','images');
        if ($request->has('image_profile')){
            $url_thumb = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_OFFICE,
                $request->image_profile);
            $data['image_profile'] = $url_thumb;
        }
        if ($request->has('image_people')){
            $url_thumb = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_OFFICE,
                $request->image_people);
            $data['image_people'] = $url_thumb;
        }
        if ($request->has('image_employment')){
            $url_thumb = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_OFFICE,
                $request->image_employment);
            $data['image_employment'] = $url_thumb;
        }
        if ($request->has('image_award')){
            $url_thumb = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_OFFICE,
                $request->image_award);
            $data['image_award'] = $url_thumb;
        }
        if ($request->has('image_client')){
            $url_thumb = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_OFFICE,
                $request->image_client);
            $data['image_client'] = $url_thumb;
        }

        $images_json = json_decode($request->input('images_json'));
        $images = $request->images;
        if ($images && count($images)) {
            foreach ($images as $key => $item) {
                $name=$item->getClientOriginalName();
                $url = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_OFFICE, $item);
                foreach($images_json as $image){
                    if(isset($image->fileName) && $image->fileName == $name){
                        $image->url = $url;
                        $image->new = false;
                    }
                }
            }
            $data['image_client_logo'] = json_encode($images_json);
        } else {
            $data['image_client_logo'] = '';
        }

        Office::create($data);
        return redirect('/admin/offices/contents');
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
        $office = Office::find($id);

        $images_json = json_decode($request->images_json);
        $images = $request->images;
        if ($images && count($images)) {
            foreach ($images as $key => $item) {
                $name=$item->getClientOriginalName();
                $url = $this->fileUpload->uploadImage1(DirectoryConstant::UPLOAD_FOLDER_OFFICE_LOGO, $item);
                foreach($images_json as $image){
                    if(isset($image->fileName) && $image->fileName == $name){
                        $image->url = $url;
                        $image->new = false;
                    }
                }
            }
        }
        $data['image_client_logo'] = json_encode($images_json);
        if(isset($request->images_delete)){
            $images_delete = json_decode($request->images_delete);
            foreach ($images_delete as $item) {
                Functions::unlinkUpload(DirectoryConstant::UPLOAD_FOLDER_OFFICE_LOGO ,$item);
            }
        }

        if ($request->has('image_profile')){
            $url_thumb = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_OFFICE,
                $request->image_profile);
            $data['image_profile'] = $url_thumb;
            if ($office->image_profile){
                self::removeImage($office->image_profile);
            }
        }
        if ($request->has('image_people')){
            $url_thumb = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_OFFICE,
                $request->image_people);
            $data['image_people'] = $url_thumb;
            if ($office->image_people){
                self::removeImage($office->image_people);
            }
        }
        if ($request->has('image_employment')){
            $url_thumb = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_OFFICE,
                $request->image_employment);
            $data['image_employment'] = $url_thumb;
            if ($office->image_employment){
                self::removeImage($office->image_employment);
            }
        }
        if ($request->has('image_award')){
            $url_thumb = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_OFFICE,
                $request->image_award);
            $data['image_award'] = $url_thumb;
            if ($office->image_award){
                self::removeImage($office->image_award);
            }
        }
        if ($request->has('image_client')){
            $url_thumb = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_OFFICE,
                $request->image_client);
            $data['image_client'] = $url_thumb;
            if ($office->image_award){
                self::removeImage($office->image_award);
            }
        }

        $data = Arr::except($data, ['images_json','images','images_delete']);
        $office->update($data);
        return redirect('/admin/offices/contents');
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

    public function removeImage($image){
        Functions::unlinkUpload(DirectoryConstant::UPLOAD_FOLDER_OFFICE ,$image);
        Functions::unlinkUpload(DirectoryConstant::UPLOAD_FOLDER_OFFICE_THUMB ,$image);
    }

}
