<?php

namespace App\Http\Controllers;

use App\Broadcaster;
use App\District;
use Illuminate\Http\Request;

class BroadcasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $broadcasters = Broadcaster::all();
        return view('broadcasters.index')->with( 'broadcasters', $broadcasters );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::all();

        return view('broadcasters.create')->with('districts', $districts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate( $request , [
            'name'=>'required'
        ]);

        $broadcaster = new Broadcaster();
        $broadcaster->name = $request->input('name');
        $districtName = $request->input('district_name');

        $district = District::where('name','like', $districtName)->get()->first();
//        $district = District::first();

        //$broadcaster->district()->associate($district);

//        foreach ( $districts as $district ) {
//            if ( strcmp( $district->name, $districtName ) == 0 ){
//                $broadcaster->district_id = $district->id;
//                $district->broadcasters()->add($broadcaster);
//            }
//        }

        $broadcaster->district_id = $district->id;
        $district->broadcasters()->save($broadcaster);

        $broadcaster->save();

        return redirect('/broadcasters')->with('success', 'Done successfully');
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
        //
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
