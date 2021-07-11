<?php

namespace App\Http\Controllers\Frontend;

use App\CategoryNew;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function __construct()
    {
        view()->share([
            'active_menu' => 'news',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderByDesc('date')->get();
        $news = $news->map(function ($m){
            $m['year'] = \Carbon\Carbon::parse($m->date);
            $m['year'] = $m['year']->year;
            return $m;
        });
        $categories = CategoryNew::all();
        return view('frontend.news.index',compact('news','categories'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategory($id)
    {
        $news = News::where('category_new_id','like','%'.$id.'%')->orderByDesc('date')->get();
        $news = $news->map(function ($m){
            $m['year'] = \Carbon\Carbon::parse($m->date);
            $m['year'] = $m['year']->year;
            return $m;
        });
        $categories = CategoryNew::all();
        $current_id = $id;
        return view('frontend.news.index',compact('news','categories','current_id'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::where('slug',$id)->firstOrFail();
        return view('frontend.news.detail',compact('news'));
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
        //
    }
}
