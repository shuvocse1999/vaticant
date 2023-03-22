<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\website_info;

class WebsiteInformation extends Controller
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
        //
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

        $data = website_info::first();

        return view('Backend.User.WebsiteInformation.edit',compact('data'));
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
            'title_en'=>$request->title_en,
            'title_italian'=>$request->title_italian,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'facebook'=>$request->facebook,
            'instagram'=>$request->instagram,
            'twitter'=>$request->twitter,
            'youtube'=>$request->youtube,
        );

        $update = website_info::where('id',1)->update($data);

        $logo = $request->file('logo');

        $favicon = $request->file('favicon');

        if($logo)
        {
            $pathImage = website_info::where('id',1)->first();

            $path = base_path().'/Backend/img/'.$pathImage->logo;

            if(file_exists($path))
            {
                unlink($path);
            }

            $imageName = 'logo.'.$logo->getClientOriginalExtension();

            $logo->move(base_path().'/Backend/img/',$imageName);

            website_info::where('id',1)->update(['logo'=>$imageName]);
        }

        if($favicon)
        {

            $pathImage = website_info::where('id',1)->first();

            $path = base_path().'/Backend/img/'.$pathImage->favicon;

            if(file_exists($path))
            {
                unlink($path);
            }

            $imageName = 'favicon.'.$favicon->getClientOriginalExtension();

            $favicon->move(base_path().'/Backend/img/',$imageName);

            website_info::where('id',1)->update(['favicon'=>$imageName]);

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
        //
    }
}
