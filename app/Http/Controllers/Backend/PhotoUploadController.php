<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\photo_gallery;

class PhotoUploadController extends Controller
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
        $data = photo_gallery::all();
        $i = 1;
        return view('Backend.User.UploadPhoto.index',compact('data','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.User.UploadPhoto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->photo_gallery;

        if($request->slider)
        {
            $slider = 1;
        }
        else
        {
            $slider = 0;
        }

        if($request->photo_gallery)
        {
            $photo_gallery = 1;
        }
        else
        {
            $photo_gallery = 0;
        }

        $data = array(
            'index_no'=>$request->index_no,
            'title'=>$request->title,
            'title_italic'=>$request->title_italic,
            'description'=>$request->description,
            'description_italic'=>$request->description_italic,
            'photo_gallery'=>$photo_gallery,
            'slider'=>$slider,
            'photo_gallery'=>$photo_gallery,
        );

        $insert = photo_gallery::insertGetId($data);

        // return $insert;

        $file = $request->file('image');

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(base_path().'/Backend/img/PhotoGallery/',$imageName);

            photo_gallery::find($insert)->update(['image'=>$imageName]);
        }

        if($insert)
        {
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
        $data = photo_gallery::find($id);
        return view('Backend.User.UploadPhoto.edit',compact('data'));
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
        if($request->slider)
        {
            $slider = 1;
        }
        else
        {
            $slider = 0;
        }

        if($request->photo_gallery)
        {
            $photo_gallery = 1;
        }
        else
        {
            $photo_gallery = 0;
        }

        $data = array(
            'index_no'=>$request->index_no,
            'title'=>$request->title,
            'title_italic'=>$request->title_italic,
            'description'=>$request->description,
            'description_italic'=>$request->description_italic,
            'slider'=>$slider,
            'photo_gallery'=>$photo_gallery,
        );

        $update = photo_gallery::find($request->id)->update($data);

        $file = $request->file('image');

        if($file)
        {
            $pathImage = photo_gallery::find($request->id);

            $path = base_path().'/Backend/img/PhotoGallery/'.$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }

            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(base_path().'/Backend/img/PhotoGallery/',$imageName);

            photo_gallery::find($request->id)->update(['image'=>$imageName]);
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
        $pathImage = photo_gallery::find($id);

        $path = base_path().'/Backend/img/PhotoGallery/'.$pathImage->image;

        if(file_exists($path))
        {
            unlink($path);
        }

        $delete = photo_gallery::find($id)->delete();

        if($delete)
        {
            return redirect()->back()->with('success','Data Delete Successfully');
        }
        else{
            return redirect()->back()->with('error','Data Delete Unsuccessfully');
        }
    }

    public function sliderStatusChange(Request $request)
    {

        $check = photo_gallery::find($request->id);

        if($check->slider == 1)
        {
            photo_gallery::find($request->id)->update(['slider'=>0]);
        }
        else
        {
            photo_gallery::find($request->id)->update(['slider'=>1]);
        }

        return 1;

    }

    public function galleryStatusChange(Request $request)
    {

        $check = photo_gallery::find($request->id);

        if($check->photo_gallery == 1)
        {
            photo_gallery::find($request->id)->update(['photo_gallery'=>0]);
        }
        else
        {
            photo_gallery::find($request->id)->update(['photo_gallery'=>1]);
        }

        return 1;

    }
}
