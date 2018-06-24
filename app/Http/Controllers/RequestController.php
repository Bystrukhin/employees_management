<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use App\Request as UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Events\RequestConsidered;

class RequestController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = UserRequest::with('users')->get();

        return view('requests.requests', ['requests' => $requests]);
    }

    /**
     * Sets required parameters needed for datetime picker.
     *
     * @return \Illuminate\Http\Response
     */
    public function prepare()
    {
        return view('requests.prepare-request');
    }

    /**
     * Show the form for creating a new resource.
     *
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $reason = $request->input('reason');

        $locations = Location::all();
        return view('requests.add-request', ['locations'=>$locations, 'reason'=>$reason]);
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
            'datetimes' => 'required',
            'location'  =>  'required'
        ]);

        $request = new UserRequest([
            'date'          => $request->input('datetimes', ''),
            'sick'          =>$request->input('isIll', '')? 1 : null,
            'user_id'       => Auth::user()->id,
            'location_id'   => $request->input('location', ''),
            'created_at'    =>date("Y-m-d H:i:s")
        ]);
        $request->save();

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $requests = UserRequest::where('user_id','=', Auth::user()->id)->get();

        return view('requests.user_request', ['requests'=>$requests]);
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
        $decision = $request->input('decision', '');

        $request = UserRequest::find($id);
        $request->approval = $decision;
        $request->save();

        event(new RequestConsidered($request, $decision));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($request_id)
    {
        $request = UserRequest::find($request_id);

        if (!$request) {
            return back();
        }

        $request->delete();

        return redirect('/admin');
    }

    /**
     * Display resource by specified params.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if($request->has('date')){
            $requests = UserRequest::with('users')->orderBy('id', $request->input('date'))->get();
        }
        if ($request->has('decision')) {
            $requests = UserRequest::with('users')->where('approval', $request->input('decision', ''))->get();
        }
        if ($request->has('status') && $request->input('status') == 'waiting') {
            $requests = UserRequest::with('users')->where('approval','=', null)->orderBy('created_at', 'desc')->get();
        }
        if ($request->has('status') && $request->input('status') == 'processed') {
            $requests = UserRequest::with('users')->where('approval','!=', null)->orderBy('created_at', 'desc')->get();
        }

        return view('requests.search-requests', ['requests' => $requests]);
    }

}
