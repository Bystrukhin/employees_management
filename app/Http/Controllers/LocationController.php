<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $locations = Location::all();

        return view('locations.list', ['locations'=>$locations]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('locations.add-location');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
        ]);

        $location = new Location([
            'address' => $request->input('address', ''),
            'created_at'=>date("Y-m-d H:i:s")
        ]);
        $location->save();

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $location_id
     * @return \Illuminate\Http\Response
     */
    public function show($location_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $location_id
     * @return \Illuminate\Http\Response
     */
    public function edit($location_id)
    {
        $location = Location::find($location_id);

        return view('locations.edit-location', ['location'=>$location]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $location_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $location_id)
    {
        $this->validate($request, [
            'address' => 'required',
        ]);

        $location = Location::find($location_id);
        $location->address = $request->input('address', '');
        $location->save();

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $location_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($location_id)
    {

        $location = Location::find($location_id);

        if (!$location) {
            return back();
        }

        $location->delete();

        return redirect('/admin');

    }

}
