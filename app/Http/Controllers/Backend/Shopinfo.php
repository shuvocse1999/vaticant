<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shop_info;
use Image;

class Shopinfo extends Controller
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
        $data = shop_info::all();
        return view('Backend.User.ShopInfo.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.User.ShopInfo.create');
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
        else{
            $status = 0;
        }

        $data = array(
            'index_no'              =>      $request->index_no,
            'shop_name'             =>      $request->shop_name,
            'shop_name_italic'      =>      $request->shop_name_italic,
            'email'                 =>      $request->email,
            'phone'                 =>      $request->phone,
            'adress'                =>      $request->adress,
            'adress_italic'         =>      $request->adress_italic,
            'map'                   =>      $request->map_location,
            'status'                =>      $status,
            'location'              =>     $request->location,
        );

        $insert = shop_info::insertGetId($data);

        if($insert)
        {
            $file = $request->file('image');

            if($file)
            {
                $path = base_path().'/Backend/img/ShopImage';

                $imageName = rand().'.'.$file->getClientOriginalExtension();

                $img = Image::make($request->file('image')->getRealPath());

                $img->resize(600,600,function($constraint){
                    $constraint->aspectRatio();
                })->save($path.'/'.$imageName);

                shop_info::find($insert)->update(['image'=>$imageName]);
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
        $data = shop_info::find($id);
        return view('Backend.User.ShopInfo.edit',compact('data'));
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
            'index_no'              =>      $request->index_no,
            'shop_name'             =>      $request->shop_name,
            'shop_name_italic'      =>      $request->shop_name_italic,
            'email'                 =>      $request->email,
            'phone'                 =>      $request->phone,
            'adress'                =>      $request->adress,
            'adress_italic'         =>      $request->adress_italic,
            'map'                   =>      $request->map_location,
            'location'              =>     $request->location,
        );

        $update = shop_info::find($request->id)->update($data);
        $file = $request->file('image');

        if($file)
        {
            $pathImage = shop_info::find($request->id);

            $pathexists = base_path().'/Backend/img/ShopImage/'.$pathImage->image;

            if(file_exists($pathexists))
            {
                unlink($pathexists);
            }

            $path = base_path().'/Backend/img/ShopImage';

            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $img = Image::make($file->getRealPath());

            $img->resize(600,600,function($constraint){
                $constraint->aspectRatio();
            })->save($path.'/'.$imageName);

            shop_info::find($request->id)->update(['image'=>$imageName]);
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
        $pathImage = shop_info::find($id);

        $pathexists = base_path().'/Backend/img/ShopImage/'.$pathImage->image;

        if(file_exists($pathexists))
        {
            unlink($pathexists);
        }

        $delete = shop_info::find($id)->delete();

        if($delete)
        {
            return redirect()->back()->with('success','Data Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Delete Unsuccessfully');
        }
    }
    public function shopStatusChange(Request $request)
    {
        $check = shop_info::find($request->id);
        if($check->status == 1)
        {
            shop_info::find($request->id)->update(['status'=>0]);
        }
        else
        {
            shop_info::find($request->id)->update(['status'=>1]);
        }

        return 1;
    }
}
