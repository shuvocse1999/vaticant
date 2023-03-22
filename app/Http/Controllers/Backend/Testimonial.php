<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\testimonials;
use Image;

class Testimonial extends Controller
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
        $data = testimonials::all();
        return view('Backend.User.Testimonial.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.User.Testimonial.create');
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

        $data =array(

            'index_no'=>$request->index_no,
            'description'=>$request->description,
            'description_italic'=>$request->description_italic,
            'client_name'=>$request->client_name,
            'designation'=>$request->designation,
            'status'=>$status,
            'image'=>'0',
            'ratings'=>$request->ratings,

        );

        $insert = testimonials::insertGetId($data);

        if($insert)
        {

            $file = $request->file('image');

            if($file)
            {
                $path = base_path().'/Backend/img/Testimonial';

                $imageName = rand().'.'.$file->getClientOriginalExtension();

                $img = Image::make($request->file('image')->getRealPath());

                $img->resize(600,600,function($constraint){
                    $constraint->aspectRatio();
                })->save($path.'/'.$imageName);

                testimonials::find($insert)->update(['image'=>$imageName]);

                return 1;

            }
            else
            {
                return 0;
            }

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
        $data = testimonials::find($id);

        return view('Backend.User.Testimonial.edit',compact('data'));
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

        if($request->status)
        {
            $status = 1;
        }
        else
        {
            $status = 0;
        }

        $data =array(

            'index_no'=>$request->index_no,
            'description'=>$request->description,
            'description_italic'=>$request->description_italic,
            'client_name'=>$request->client_name,
            'designation'=>$request->designation,
            'status'=>$status,
            'ratings'=>$request->ratings,

        );

        $update = testimonials::find($request->id)->update($data);

        $file = $request->file('image');

        if($file)
        {
            $pathImage = testimonials::find($request->id);

            $pathexists = base_path().'/Backend/img/Testimonial/'.$pathImage->image;

            if(file_exists($pathexists))
            {
                unlink($pathexists);
            }

            $path = base_path().'/Backend/img/Testimonial';

            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $img = Image::make($request->file('image')->getRealPath());

            $img->resize(600,600,function($constraint){
                $constraint->aspectRatio();
            })->save($path.'/'.$imageName);

            testimonials::find($request->id)->update(['image'=>$imageName]);
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
        $pathImage = testimonials::find($id);

        $pathexists = base_path().'/Backend/img/Testimonial/'.$pathImage->image;

        if(file_exists($pathexists))
        {
            unlink($pathexists);
        }

        $delete = testimonials::find($id)->delete();

        if($delete)
        {
            return redirect()->back()->with('success','Data Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Delete Unsuccessfully');
        }
    }

    public function testimonialStatusChange(Request $request)
    {
        $check = testimonials::find($request->id);

        if($check->status == 1)
        {
            testimonials::find($request->id)->update(['status'=> 0]);
        }
        else
        {
            testimonials::find($request->id)->update(['status'=>1]);
        }

        return 1;
    }
}
