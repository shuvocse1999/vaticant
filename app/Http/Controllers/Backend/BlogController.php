<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\blog_info;
use Auth;
use Image;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = blog_info::all();
        return view('Backend.User.Blog.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.User.Blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->status)
        {
            $status = 1;
        }
        else
        {
            $status = 0;
        }

        $data = array(
            'index_no'=>$request->index_no,
            'blog_title'=>$request->blog_title,
            'blog_title_italic'=>$request->blog_title_italic,
            'description'=>$request->description,
            'description_italic'=>$request->description_italic,
            'image'=>'0',
            'meta_tag'=>$request->meta_tag,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'alter_image'=>$request->alter_image,
            'admin_id'=>Auth::user()->admin_id,
            'status'=>$status,
        );

        $insert = blog_info::insertGetId($data);

        if($insert)
        {
            $file = $request->file('image');

            if($file)
            {
                $path = base_path().'/Backend/img/BlogImage';

                $imageName = rand().'.'.$file->getClientOriginalExtension();

                $img = Image::make($file->getRealPath());

                $img->resize(600,600,function($constraint){
                    $constraint->aspectRatio();
                })->save($path.'/'.$imageName);

                blog_info::find($insert)->update(['image'=>$imageName]);
            }

            return 1;
        }
        else
        {
            return 0;
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
        $data = blog_info::find($id);
        return view('Backend.User.Blog.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = array(
            'index_no'=>$request->index_no,
            'blog_title'=>$request->blog_title,
            'blog_title_italic'=>$request->blog_title_italic,
            'description'=>$request->description,
            'description_italic'=>$request->description_italic,
            'admin_id'=>Auth::user()->admin_id,
            'meta_tag'=>$request->meta_tag,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'alter_image'=>$request->alter_image,
        );

        $update = blog_info::find($request->id)->update($data);

        $file = $request->file('image');

        if($file)
        {
            $pathImage = blog_info::find($request->id);

            $pathexists = base_path().'/Backend/img/BlogImage/'.$pathImage->image;

            if(file_exists($pathexists))
            {
                unlink($pathexists);
            }

            $path = base_path().'/Backend/img/BlogImage';

            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $img = Image::make($file->getRealPath());

            $img->resize(600,600,function($constraint){
                $constraint->aspectRatio();
            })->save($path.'/'.$imageName);

            blog_info::find($request->id)->update(['image'=>$imageName]);
        }

        if($update)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pathImage = blog_info::find($id);

        $pathexists = base_path().'/Backend/img/BlogImage/'.$pathImage->image;

        if(file_exists($pathexists))
        {
            unlink($pathexists);
        }

        $delete = blog_info::find($id)->delete();

        if($delete)
        {
            return redirect()->back()->with('success','Data Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Delete Unsuccessfully');
        }
    }

    public function blogStatusChange(Request $request)
    {
        $check = blog_info::find($request->id);

        if($check->status == 1)
        {
            blog_info::find($request->id)->update(['status'=> 0]);
        }
        else
        {
            blog_info::find($request->id)->update(['status'=>1]);
        }

        return 1;
    }
}
