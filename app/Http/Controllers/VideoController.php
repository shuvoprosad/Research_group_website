<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reference;
use DB;
use App\Post;
use App\Image;
use App\Video;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $videos = Video::with('post')->simplePaginate(10);
        $postData = Post::get();
        return view('videoCreateOrEdit',compact('videos', 'postData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:255',
            'postId'=>'required',
            'link'=>'required|url'
        ]);
        $title = $request->input('title');
        $link = $request->input('link');
        $postId = $request->input('postId');
        $data=array('title'=>$title,'postId'=>$postId,'link'=>$link);
        DB::table('videos')->insert($data);
        $request->session()->flash('alert-success', 'Video was successful added!');
        return redirect()->route("video_create");
        
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
        $videos = Video::with('post')->simplePaginate(10);
        $postData=DB::table('posts')->get();
        $vEditInfo = Video::with('post')->find($id);
        //dd($vEditInfo);
        return view('videoCreateOrEdit',compact('videos','postData','vEditInfo'));
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
        $title = $request->input('title');
        $postId = $request->input('postId');
        $link = $request->input('link');
        $data=array('title'=>$title,'postId'=>$postId,'link'=>$link);
        Video::where('id',$id)->update($data);
        $request->session()->flash('alert-success', 'Video Link was successful Updated!');
        return redirect()->route("video_create");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Video::destroy($id);
        return redirect()->route("video_create")->with('flash_message', 'Video Link deleted!');
    }
}
