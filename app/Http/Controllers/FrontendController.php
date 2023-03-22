<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\photo_gallery;
use App\Models\service_info;
use App\Models\blog_info;
use App\Models\testimonials;
use App\Models\shop_info;
use App\Models\about_us;
use App\Models\faq;
use App\Models\partner_info;
use App\Models\contact_us;
use App\Models\offer_info;
use DB;
use Auth;
use Mail;

class FrontendController extends Controller
{
    public function home()
    {
        $slider = photo_gallery::orderBy('id','DESC')->where('slider',1)->take(3)->get();

        $service = service_info::where('status',1)->orderBy('index_no','ASC')->get();

        $blog = blog_info::where('status',1)->orderBy('index_no','ASC')->take(6)->get();

        $testimonial = testimonials::where('status',1)->orderBy('index_no','ASC')->take(5)->get();

        $shop = shop_info::where('status',1)->orderBy('index_no','DESC')->take(3)->get();

        $gallery = photo_gallery::orderBy('index_no','DESC')->where('photo_gallery',1)->take(10)->get();

        $partner = partner_info::orderBy('index_no','DESC')->where('status',1)->take(10)->get();


        return view('Frontend.Layouts.home',compact('slider','service','blog','testimonial','shop','gallery','partner'));
    }

    public function aboutUs()
    {
        $data = about_us::first();
        return view('Frontend.User.about_us',compact('data'));
    }

    public function service()
    {
        $data = service_info::where('status',1)->orderBy('index_no','DESC')->simplePaginate(12);
        return view('Frontend.User.service',compact('data'));
    }

    public function blog()
    {
        $data = blog_info::where('status',1)->orderBy('index_no','DESC')->simplePaginate(9);
        return view('Frontend.User.blog',compact('data'));
    }

    public function about_faq()
    {
        $data = faq::where('status',1)->orderBy('index_no','DESC')->simplePaginate(10);
        return view('Frontend.User.about_faq',compact('data'));
    }

    public function contact()
    {
        $shop_info = shop_info::where('status',1)->orderBy('index_no','DESC')->take(3)->get();
        return view('Frontend.User.contact',compact('shop_info'));
    }

    public function service_detail($id)
    {
        $data = service_info::find($id);
        return view('Frontend.User.service_detail',compact('data'));
    }

    public function blog_detail($id)
    {
        $data = blog_info::find($id);
        
        return view('Frontend.User.blog_detail',compact('data'));
    }

    public function serviceDetail($id)
    {
        $data = service_info::find($id);

        return view('Frontend.User.service_detail',compact('data'));
    }

    public function offers()
    {
        $data = offer_info::where('status',1)->orderBy('index_no','DESC')->simplePaginate(9);
        return view('Frontend.User.offers',compact('data'));
    }
    public function offer_detail($id)
    {
        $data = offer_info::find($id);
        return view('Frontend.User.offer_detail',compact('data'));
    }

    public function sendMail(Request $request)
    {
        // dd($request->all());

        $data = array(
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>$request->message,
        );

        $insert = contact_us::create($data);

        if($insert)
        {
            $mail_data = [
                'recipient' => $request->email,
                'fromEmail' => 'vaticanmultiservicepoint@gmail.com',
                'fromName' => 'Vatican Multiservice Point',
                'subject' => 'Reply Message From Vatican Multi Service Point',
                'body' => 'Hi <b>'.$request->name.'</b> We have recived Your Message. We Will Contact With You Soon',
            ];


            Mail::send('email-template',$mail_data,function($message) use ($mail_data){
                $message->to($mail_data['recipient'])
                         ->from($mail_data['fromEmail'],$mail_data['fromName'])
                         ->subject($mail_data['subject']);
            });

            return redirect()->back()->with('success','Your Message Sent Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Something Went Wrong Please Try Again');
        }

    }
    
    public function searchservice(Request $request)
    {
        $language = \Illuminate\Support\Facades\App::getLocale();
        if($language == 'en')
        {
            
            $data = service_info::where('status',1)->where('service_name','LIKE','%'.$request->search_text.'%')->get();
        }
        else
        {
            $data = service_info::where('status',1)->where('service_name_italic','LIKE','%'.$request->search_text.'%')->get();
            
        }
        
        return view('Frontend.User.search_result',compact('data'));
    }


    public function bookinglags(){
        $time = DB::table("time")->get();
        $shop = shop_info::where('status',1)->orderBy('index_no','DESC')->take(3)->get();
        return view("Frontend.User.bookinglags",compact('time','shop'));
    }


    public function bookingbagsnow(Request $r){

        DB::table("booking")->insert([

            'checkin' => $r->checkin,
            'checkout' => $r->checkout,
            'from_time' => $r->from_time,
            'to_time' => $r->to_time,
            'bags' => $r->bags,
            'total' => $r->total,
            'location' => $r->location,
            'name' => $r->name,
            'email' => $r->email,
            'phone' => $r->phone,
            'address' => $r->address,

        ]);

         return redirect()->back()->with('success','Booking Successfully Done');
    }
}
