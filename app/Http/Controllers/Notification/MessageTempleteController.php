<?php

namespace App\Http\Controllers\Notification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MessageTemplete;

class MessageTempleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $msg_templetes=MessageTemplete::all();
        return view('notification.msg-templete.msg-templete',['msg_templetes'=>$msg_templetes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('notification.msg-templete.new');
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
        $msg_templete=new MessageTemplete;
        
        $msg_templete->name=$request->msg_templete_name;
        $msg_templete->templete=$request->msg_content;

        if($msg_templete->save()){
            $request->session()->flash('status','Message Templete with name'.$request->msg_templete_name.' successfully added');
            return redirect('/msg-templete');
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
        $msg_templete=MessageTemplete::find($id);
        return json_encode($msg_templete);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $msg_templete=MessageTemplete::find($id);
        return view('notification.msg-templete.update',['msg_templete'=>$msg_templete]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $new_msg_templete=MessageTemplete::find($id);
        $new_msg_templete->name=$request->msg_templete_name;
        $new_msg_templete->templete=$request->msg_content;
        if($new_msg_templete->save()){
            $request->session()->flash('status', 'Message Templete successfully updated !');
            return redirect('/msg-templete');
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
