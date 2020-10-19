<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserRequest;
use App\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Toastr;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {

    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('users.view')) {
            abort(403, 'Unauthorized action.');
        }

        $users = User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('users.create')) {
            abort(403, 'Unauthorized action.');
        }

        $roles = Role::all();
        $user = new User();
        return view('users.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUserRequest $request)
    {
        if (!auth()->user()->can('users.create')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('username', 'fullname', 'email', 'address', 'phone', 'salary');
            $input['password'] = bcrypt($request->password);
            $role = Role::find($request->role_id);
            DB::beginTransaction();
            $user = User::create($input);
            $user->assignRole($role);
            Toastr::success('User created successfully','Success');
            DB::commit();
            return redirect()->route('users.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('User Create Failed');
            return redirect()->back()->withErrors(new \Illuminate\Support\MessageBag(['catch_exception'=>$ex->getMessage()]));
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
        if (!auth()->user()->can('users.view')) {
            abort(403, 'Unauthorized action.');
        }

        $roles = Role::all();
        $user = User::with('roles')->find($id);
        return view('users.view', compact('user','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('users.edit')) {
            abort(403, 'Unauthorized action.');
        }

        $roles = Role::all();
        $user = User::find($id);
        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUserRequest $request, $id)
    {
        if (!auth()->user()->can('users.edit')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('username', 'fullname', 'email', 'address', 'phone', 'salary');
            $role = Role::find($request->role_id);
            DB::beginTransaction();
            $user = User::find($id);
            $user->fill($input)->update();
            $user->syncRoles($role);
            Toastr::success('User updated successfully','Success');
            DB::commit();
            return redirect()->route('users.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('User Update Failed');
            return redirect()->back()->withErrors(new \Illuminate\Support\MessageBag(['catch_exception'=>$ex->getMessage()]));
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


    public function delete($id)
    {
        if (!auth()->user()->can('users.delete')) {
            abort(403, 'Unauthorized action.');
        }

        $user = User::find($id);
        $user->roles()->detach();
        $user->delete();
        Toastr::success('User deleted successfully','Success');
        return [
            'msg' => 'success'
        ];
    }
}
