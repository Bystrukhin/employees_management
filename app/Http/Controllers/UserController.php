<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Events\UserAddedEvent;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('permissions')->where('users.admin','=', null)->get();
        return view('employees.list', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('employees.add-user', ['permissions'=>$permissions]);
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
            'email'=>'required',
        ]);

        $code = str_random(8);
        $newCode = bcrypt($code);

        $user = new User([
            'name' => $request->input('name', ''),
            'email'=>$request->input('email', ''),
            'password' => $newCode,
            'created_at'=>date("Y-m-d H:i:s")
        ]);
        $user->save();

        event(new UserAddedEvent($user, $code));

        foreach ($request->input('permissions') as $permission) {

            DB::table('permission_user')
                ->insert(['user_id' => $user->id, 'permission_id' => $permission]);

        }

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
    public function edit($user_id)
    {
        $user = User::where('id', $user_id)->with('permissions')->get();

        $permissions = Permission::all();

        return view('employees.edit-user', ['user'=>$user, 'permissions'=>$permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::find($user_id);
        $user->name = $request->input('name', '');
        $user->email = $request->input('email', '');
        $user->save();

        DB::table('permission_user')
            ->where('user_id', '=', $user->id)
            ->delete();

        foreach ($request->input('permissions') as $permission) {

            DB::table('permission_user')
                ->insert(['user_id' => $user->id, 'permission_id' => $permission]);

        }

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return back();
        }

        $user->delete();

        return redirect('/admin');
    }

}
