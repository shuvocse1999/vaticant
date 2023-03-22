<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\faq;

class FaqController extends Controller
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
        $data = faq::all();
        return view('Backend.User.Faq.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.User.Faq.create');
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
            'questions'=>$request->questions,
            'questions_italic'=>$request->questions_italic,
            'answer'=>$request->answer,
            'answer_italic'=>$request->answer_italic,
            'status'=>$status,
        );

        $insert = faq::create($data);

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
        $data = faq::find($id);
        return view('Backend.User.Faq.edit',compact('data'));
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
            'questions'=>$request->questions,
            'questions_italic'=>$request->questions_italic,
            'answer'=>$request->answer,
            'answer_italic'=>$request->answer_italic,
        );

        $update = faq::find($request->id)->update($data);

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
        $delete = faq::find($id)->delete();
        if($delete)
        {
            return redirect()->back()->with('success','Data Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Delete Unsuccessfull');
        }
    }

    public function faqStatusChange(Request $request)
    {
        $check = faq::find($request->id);

        if($check->status == 1)
        {
            faq::find($request->id)->update(['status'=> 0]);
        }
        else
        {
            faq::find($request->id)->update(['status'=>1]);
        }

        return 1;
    }
}
