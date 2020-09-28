<?php

namespace App\Services;

use App\Constants\FanpageConstant;
use App\Constants\StatusCode;
use App\Helpers\Functions;
use App\Models\FanpagePost;

class FanpagePostService
{
    public $fanpage_post;

    public function __construct(FanpagePost $fanpage_post)
    {
        $this->fanpage_post = $fanpage_post;
    }

    public function index($search)
    {
        $posts = $this->fanpage_post->search($search)->paginate(StatusCode::PAGINATE_20);
        return  $posts;
    }

    public function create(array $data)
    {
        $token = $data['access_token'];
        $method = 'GET';
        $uri = 'https://graph.facebook.com/v8.0/me/posts';
        $field = '';

        $datas = Functions::getDataFaceBook($token,$method,$uri,$field);
        $lenght = count($datas) > $data['total_post'] ? $data['total_post'] : count($datas);
        for ($i = 0; $i < $lenght; $i++) {
            $date = date_create($datas[$i]->created_time);
            $post = FanpagePost::where('post_id', $datas[$i]->id)->first();
            if ($post) {
                $post->access_token = $token;
                $post->save();
            } else {
                FanpagePost::create([
                    'access_token' => $token,
                    'page_id' => $data['page_id'],
                    'post_id' => $datas[$i]->id,
                    'title' => isset($datas[$i]->message) ? $datas[$i]->message : '',
                    'post_created' => $date,
                    'used' => FanpageConstant::FANPAGE_POST_NOT_USED,
                    'source_id' => $data['source_id'] ?: 0
                ]);
            }
        }
        return 1;
    }

    public function show($id)
    {

    }

    public function update(array $data, $id)
    {
    }

    public function delete($id)
    {

    }
}