<?php

namespace App\Http\Controllers;

use App\Broadcaster;
use App\Line;
use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = Subscriber::orderBy('created_at','desc')->paginate(12);
        return view('subscribers.index')->with( 'subscribers', $subscribers );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subscribers = Subscriber::all();
        $broadcasters = Broadcaster::all();
        $lines = Line::all();

        return view('subscribers.create')->with( 'subscribers', $subscribers )
                                              ->with('broadcasters', $broadcasters)
                                              ->with('lines', $lines);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request , [
            'name'=>'required'
        ]);

        $subscriber = new Subscriber();

        $subscriber->name = $request->input('name');

        $lineName = $request->input('line_name');
        $line = Line::where('name','like', $lineName)->get()->first();
        $subscriber->line_id = $line->id;


        $broadcasterName = $request->input('broadcaster_name');
        $broadcaster = Broadcaster::where('name','like', $broadcasterName)->get()->first();
        $subscriber->broadcaster_id = $broadcaster->id;

        $subscriber->save();

        $line->subscribers()->save($subscriber);
        $broadcaster->subscribers()->save($subscriber);

        $subscriber->save();

        return redirect('/subscribers')->with('success', 'Done successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('subscribers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subscriber = Subscriber::find($id);
        $subscribers = Subscriber::all();
        $broadcasters = Broadcaster::all();
        $lines = Line::all();

        return view('subscribers.edit')->with( 'subscriber', $subscriber )
                                            ->with( 'subscribers', $subscribers )
                                            ->with('broadcasters', $broadcasters)
                                            ->with('lines', $lines);
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
        $subscriber = Subscriber::find($id);
        $subscriber->name = $request->input('name');

        $subscriber->save();

        return redirect('/subscribers')->with('success', 'Done successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $subscriber = Subscriber::find($id);

        $subscriber->delete();

        return redirect('/subscribers')->with('success', 'Done successfully');
    }

    public function showByLine()
    {

    }
}
