<?php

namespace App\Http\Controllers\Backend;

use App\Models\Fanpage;
use App\Services\FanpagePostService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FanpagePostController extends Controller
{
    private $fanpage_post;

    public function __construct(FanpagePostService $fanpage_post)
    {
        $this->fanpage_post = $fanpage_post;
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $arr_fanpage_id = Fanpage::where('user_id',$user_id)->pluck('page_id')->toArray();
        $search['searchPage_Post'] = $arr_fanpage_id;
        $posts = $this->fanpage_post->index($search);
        return view('backend.marketing.fanpage_post.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $this->fanpage_post->create($request->all());
        return 1;
    }
}
