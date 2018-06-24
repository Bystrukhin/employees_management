<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $permissions = Permission::all();

        return view('permissions.list', ['permissions'=>$permissions]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.add-permission');
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
            'name' => 'required',
        ]);

        $permission = new Permission([
            'name' => $request->input('name', ''),
            'created_at'=>date("Y-m-d H:i:s")
        ]);
        $permission->save();

        return redirect('/admin');

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
    public function edit($permission_id)
    {
        $permission = Permission::find($permission_id);

        return view('permissions.edit-permission', ['permission'=>$permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $permission_id)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);

        $permission = Permission::find($permission_id);
        $permission->name = $request->input('name', '');
        $permission->save();

        return redirect('/admin');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($permission_id)
    {

        $permission = Permission::find($permission_id);

        if (!$permission) {
            return back();
        }

        $permission->delete();

        return redirect('/admin');

    }

}
