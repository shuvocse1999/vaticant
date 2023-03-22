<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BackendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $total_admin = DB::table('users')->count();
        $total_testimonials = DB::table('testimonials')->count();
        $total_shops = DB::table('shop_infos')->count();
        $total_services = DB::table('service_infos')->count();
        $total_blog = DB::table('blog_infos')->count();
        $total_partner = DB::table('partner_infos')->count();
        $recent_message = DB::table('contact_uses')->orderBy('id','DESC')->take(10)->get();
        return view('Backend.Layouts.home',compact('total_admin','total_testimonials','total_shops','total_services','total_blog','total_partner','recent_message'));
    }
    public function messages()
    {
        $messages = DB::table('contact_uses')->orderBy('id','DESC')->get();
        return view('Backend.User.Messages.index',compact('messages'));
    }
    public function messagedelete($id)
    {
        $delete = DB::table('contact_uses')->where('id',$id)->delete();

        if($delete)
        {
            return redirect()->back()->with('success','Message Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Delete Unsuccessfully');
        }
    }


    public function addtime(){

        $data = DB::table('time')->get();
        return view("Backend.User.time.addtime",compact('data'));
    }

    public function inserttime(Request $r){
        DB::table("time")->insert([
            'time'   => $r->time,
            'sl' => $r->sl
        ]);

        return redirect()->back()->with('success','Time Added Successfully');
    }


    public function deletetime($id){
        DB::table("time")->where('id',$id)->delete();
        return redirect()->back()->with('success','Time Delete Successfully');

    }

    public function managebooking(){

        $data = DB::table('booking')->orderBy('id','DESC')->get();
        return view("Backend.User.time.booking",compact('data'));
    }

    public function deletebooking($id){
        DB::table('booking')->where('id',$id)->delete();
        return redirect()->back()->with('success','Booking Delete Successfully');
    }

}
