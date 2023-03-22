<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\partner_info;
use Image;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = partner_info::all();
        return view('Backend.User.Partner.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.User.Partner.create');
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
            'partner_name'=>$request->partner_name,
            'partner_name_italic'=>$request->partner_name_italic,
            'description'=>$request->description,
            'description_italic'=>$request->description_italic,
            'image'=>'0',
            'status'=>$status,

        );

        $insert = partner_info::insertGetId($data);

        if($insert)
        {
            $file = $request->file('image');

            if($file)
            {
                $path = base_path().'/Backend/img/PartnerImage';

                $imageName = rand().'.'.$file->getClientOriginalExtension();

                $img = Image::make($file->getRealPath());

                $img->resize(600,600,function($constraint){
                    $constraint->aspectRatio();
                })->save($path.'/'.$imageName);

                partner_info::find($insert)->update(['image'=>$imageName]);
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
        $data = partner_info::find($id);

        return view('Backend.User.Partner.edit',compact('data'));
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
            'partner_name'=>$request->partner_name,
            'partner_name_italic'=>$request->partner_name_italic,
            'description'=>$request->description,
            'description_italic'=>$request->description_italic,

        );

        $update = partner_info::find($request->id)->update($data);

        $file = $request->file('image');

        if($file)
        {
            $pathImage = partner_info::find($request->id);

            $pathexists = base_path().'/Backend/img/PartnerImage/'.$pathImage->image;

            if(file_exists($pathexists))
            {
                unlink($pathexists);
            }

            $path = base_path().'/Backend/img/PartnerImage';

            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $img = Image::make($file->getRealPath());

            $img->resize(600,600,function($constraint){
                $constraint->aspectRatio();
            })->save($path.'/'.$imageName);

            partner_info::find($request->id)->update(['image'=>$imageName]);
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
        $pathImage = partner_info::find($id);

        $pathexists = base_path().'/Backend/img/PartnerImage/'.$pathImage->image;

        if(file_exists($pathexists))
        {
            unlink($pathexists);
        }

        $delete = partner_info::find($id)->delete();

        if($delete)
        {
            return redirect()->back()->with('success','Data Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Delete Unsuccessfully');
        }
    }

    public function partnerStatusChange(Request $request)
    {
        $check = partner_info::find($request->id);

        if($check->status == 1)
        {
            partner_info::find($request->id)->update(['status'=> 0]);
        }
        else
        {
            partner_info::find($request->id)->update(['status'=>1]);
        }

        return 1;
    }
}
