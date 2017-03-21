<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('event/list', ['events' => Events::orderBy('start_time')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('event/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $time=explode(" - ",$request->input('time'));
        $event = new Event;
        $event->name=$request->input('name');
        $event->title=$request->input('title');
        $event->start_time=$time[0];
        $event->end_time=$time[1];
        $event->save();

        $request->session()->flash('success','The event created successfully!');
        return redirect('events/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view ('event/view', ['event' => Event::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view ('event/edit', ['event' => Event::findOrFail($id)]);
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
        $time=explode(" - ",$request->input('time'));
        $event = new Event;
        $event->name=$request->input('name');
        $event->title=$request->input('title');
        $event->start_time=$time[0];
        $event->end_time=$time[1];
        $event->save();
        return redirect('events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $event= Event::Find($id);
       $event->delete();
       return redirect('events');
    }
}
