<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AutoCode($table, $fildname, $prefix, $length)
    {
        $id_length = $length;
        $max_id = DB::table($table)->max($fildname);
        $prefix = $prefix;
        $prefix_length = strlen($prefix);
        $only_id = substr($max_id, $prefix_length);
        $new = (int)($only_id);
        $new++;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        $made_id = $prefix . $zero . $new;
        return $made_id;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('users')->get();
        return view('Backend.User.Admin.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.User.Admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->name;

        $check_mail = DB::table('users')->where('email',$request->email)->count();

        // return $check_mail;

        if($check_mail == 0)
        {
            $admin_id = $this->AutoCode('users','admin_id','ADM-','10');

            $data = array(
                'admin_id'=>$admin_id,
                'user_type'=>$request->user_type,
                'name'=>$request->name,
                'fathers_name'=>$request->fathers_name,
                'mothers_name'=>$request->mothers_name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'password'=>Hash::make($request->password),
                'pass_recover'=>$request->password,
                'designation'=>$request->designation,
                'image'=>'0',
            );

            $insert = DB::table('users')->insert($data);

            $file = $request->file('image');

            if($file)
            {
                $imagName = $admin_id.'.'.$file->getClientOriginalExtension();

                $file->move(base_path().'/Backend/img/AdminImage/',$imagName);

                Db::table('users')->where('admin_id',$admin_id)->update(['image'=>$imagName]);
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
        else
        {
            return 2;
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
        $data = DB::table('users')->where('admin_id',$id)->first();

        return view('Backend.User.Admin.edit',compact('data'));
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

        // return $request->admin_id;

        $check_mail = DB::table('users')->where('email',$request->email)->count();


        $data = array(
            'name'=>$request->name,
            'user_type'=>$request->user_type,
            'fathers_name'=>$request->fathers_name,
            'mothers_name'=>$request->mothers_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'password'=>Hash::make($request->password),
            'pass_recover'=>$request->password,
            'designation'=>$request->designation,
        );

        $update = DB::table('users')->where('admin_id',$request->admin_id)->update($data);

        $file = $request->file('image');

        if($file)
        {
            $pathImage = DB::table('users')->where('admin_id',$request->admin_id)->first();

            $path = base_path().'/Backend/img/AdminImage/'.$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }
        }

        if($file)
        {
            $imagName = $request->admin_id.'.'.$file->getClientOriginalExtension();

            $file->move(base_path().'/Backend/img/AdminImage/',$imagName);

            Db::table('users')->where('admin_id',$request->admin_id)->update(['image'=>$imagName]);
        }

        if($update)
        {
            return 1;
        }
        else{
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
        $pathImage = DB::table('users')->where('admin_id',$id)->first();

        $path = base_path().'/Backend/img/AdminImage/'.$pathImage->image;

        if(file_exists($path))
        {
            unlink($path);
        }

        $delete = DB::table('users')->where('admin_id',$id)->delete();

        if($delete)
        {
            return redirect()->back()->with('success','Data Delete Successfully');
        }
        else{
            return redirect()->back()->with('error','Data Delete Unsuccessfully');
        }

    }

    public function adminStatusChange(Request $request)
    {

        // return $request->admin_id;

        $check = DB::table('users')->where('id',$request->admin_id)->first();

        // return $check->status;

        if($check->status == 0)
        {
            $update = DB::table('users')->where('id',$request->admin_id)->update(['status'=>1]);
        }
        elseif($check->status == 1)
        {
            $update = DB::table('users')->where('id',$request->admin_id)->update(['status'=>0]);
        }



            return 1;



    }
}
