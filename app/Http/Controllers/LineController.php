<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Line;

class LineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $lines = Line::orderBy('created_at','desc');
        $lines = Line::all();
        return view('lines.index')->with( 'lines', $lines );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lines.create');
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

        $line = new Line();
        $line->name = $request->input('name');
        $line->save();

        return redirect('/lines')->with('success', 'Done successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/lines');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $line = Line::find($id);

//        if ( auth()->user()->id !== $post->user_id )
//            return redirect('posts')->with( 'error', 'Unauthorized');

        return view('lines.edit')->with('line',$line);
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
        $line = Line::find($id);
        $line->name = $request->input('name');

        $line->save();

        return redirect('/lines')->with('success', 'Done successfully');
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
        $line = Line::find($id);

//        if ( auth()->user()->id !== $post->user_id )
//            return redirect('posts')->with( 'error', 'Unauthorized');

        $line->delete();

        return redirect('/lines')->with('success', 'Done successfully');
    }
}
