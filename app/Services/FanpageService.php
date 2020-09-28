<?php

namespace App\Services;

use App\Constants\StatusCode;
use App\Helpers\Functions;
use App\Models\Fanpage;

class FanpageService
{
    public $fanpage;

    public function __construct(Fanpage $fanpage)
    {
        $this->fanpage = $fanpage;
    }

    public function index($request)
    {
        $user_id = Functions::getUserId();
        $fanpages = Fanpage::where('user_id', $user_id)->orderByDesc('id');
        $fanpages_arr = $fanpages->pluck('page_id')->toArray();
        $fanpages = $fanpages->paginate(StatusCode::PAGINATE_20);


        $token = $request->session()->has('login-facebook') ? $request->session()->get('login-facebook')->token : null;
        $method = 'GET';
        $uri = 'https://graph.facebook.com/v8.0/me/accounts';
        $field = 'picture,id,name,access_token,tasks';
        if (!empty($token)) $datas = Functions::getDataFaceBook($token, $method, $uri, $field);

        if (isset($datas) && count($datas)) {
            foreach ($datas as $item) {
                $page_id = $item->id;
                if (in_array($page_id, $fanpages_arr)) {
                    Fanpage::where('page_id', $page_id)->update([
                        'access_token' => $item->access_token
                    ]);
                } else {
                    Fanpage::create([
                        'access_token' => $item->access_token,
                        'user_id' => $user_id,
                        'page_id' => $item->id,
                        'name' => $item->name,
                        'avatar' => @$item->picture->data->url,
                        'role_text' => in_array('MANAGE', $item->tasks) ? 'Quản trị viên' : 'Biên tập viên',
                        'used' => 0,
                        'source_id' => 0
                    ]);
                }
            }
        }

        return $fanpages;
    }

    public function create(array $data)
    {

    }

    public function show($id)
    {

    }

    public function update($data, $id)
    {
        $fanpage = Fanpage::find($id);
        $fanpage->used = $data['used'];
        $fanpage->source_id = $data['source_id'];
        $fanpage->save();
        return $fanpage;
    }

    public function delete($id)
    {

    }
}
