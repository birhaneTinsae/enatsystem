<?php

namespace App\Http\Controllers\Notification;

use App\NotificationGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationGroupController extends Controller
{
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
        $group=NotificationGroup::all();
        return view('notification.group-notification.new',['group'=>$group]);
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
        $group=new NotificationGroup;
        $group->name=$request->name;
        if($group->save()){
            $request->session->flash('status',`Notification group ${$request->name} successfully added.`);
        }
        // foreach($request->employees as $employee){
        //     $emp=Employee::findOrFail($employee->id);
        //     $emp->notification_group=
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NotificationGroup  $notificationGroup
     * @return \Illuminate\Http\Response
     */
    public function show(NotificationGroup $notificationGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NotificationGroup  $notificationGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(NotificationGroup $notificationGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NotificationGroup  $notificationGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotificationGroup $notificationGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NotificationGroup  $notificationGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotificationGroup $notificationGroup)
    {
        //
    }
}
