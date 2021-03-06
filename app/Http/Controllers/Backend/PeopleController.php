<?php

namespace App\Http\Controllers\Backend;

use App\Constants\DirectoryConstant;
use App\Helpers\Functions;
use App\People;
use App\Services\UploadService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class PeopleController extends Controller
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
        $people = People::orderByDesc('id')->paginate(50);
        return view('backend.list_people.index',compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.list_people._form');
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
        if ($request->image != "null") {
            $url_thumb = $this->fileUpload->uploadImage1(DirectoryConstant::UPLOAD_FOLDER_PEOPLE,
                $request->image);
            $data['avatar'] = $url_thumb;
        }
        $data = Arr::except($data, 'image');
        People::create($data);
        return redirect('/admin/offices/people');
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
        $people = People::find($id);
        return view('backend.list_people._form', compact('people'));
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
        $people = People::find($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $url_thumb = $this->fileUpload->uploadImage(DirectoryConstant::UPLOAD_FOLDER_PEOPLE,
                $request->image);
            $data['avatar'] = $url_thumb;
            Functions::unlinkUpload(DirectoryConstant::UPLOAD_FOLDER_PEOPLE , $people->avatar);
        } else {
            unset($data['image']);
        }
        $data = Arr::except($data, 'image');
        $people->update($data);
        return redirect('/admin/offices/people');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        People::find($id)->delete();
        return 1;
    }
}
