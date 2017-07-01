<?php

namespace Boye\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Boye\Http\Controllers\Controller;
use Auth;
use Boye\Post;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  response()->json(['model' => Post::filterPaginateOrder()]);
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
        if(Auth::user()->is_admin) {
       // \Log::info($request->all());
        //tags
        //$tags = str_slug( $request->get('tags'), $separator = ',' );
       // $tags = implode(',',array_unique(explode(',', $tags)));
        //image upload
        $exploded = explode(',', $request->image);
        $decoded = base64_decode($exploded[1]);
        if(str_contains($exploded[0], 'jpg'))
            $extention = 'jpg';
        else
            $extention = 'png';
        $filename = str_random().'.'.$extention;
        Image::make($request->get('image'))->resize(600, 600)->save(public_path('content/').$filename);
       // $path = public_path('content').'/'.$filename;
        //file_put_contents($path, $decoded);
        $data = array_merge($request->except('image'),[
            'image' => 'content/'. $filename,
            //'tags' => $tags,
            'user_id' => Auth::id(),
            'slug' => str_slug($request->title)
            ]);
        Post::create($data);
        return response()->json(['success' => true]);
        }else{
            return response()->json(['success' => false]);
        }
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
        if(Auth::user()->id || Auth::user()->is_admin) {
        Post::findOrfail($id)->delete();
        return response()->json(['deleted' => true]);
       } else{
            return response()->json(['success' => false]);
       }
    }
}
