<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Toastr;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('roles.view')) {
            abort(403, 'Unauthorized action.');
        }

        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('roles.create')) {
            abort(403, 'Unauthorized action.');
        }

        $role = new Role();
        return view('roles.create', compact( 'role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('roles.create')) {
            abort(403, 'Unauthorized action.');
        }

        try {
//            dd($request->permissions);
            DB::beginTransaction();
            $role = Role::create(['name' => $request->name]);
            $role->syncPermissions($request->permissions);
            Toastr::success('Role created successfully','Success');
            DB::commit();
            return [
                'success' => true
            ];
        } catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('Role Create Failed');
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
        if (!auth()->user()->can('roles.edit')) {
            abort(403, 'Unauthorized action.');
        }
        $role = Role::with('permissions')->find($id);
        $permissions = $role->permissions()->get()->pluck('name','id');
        dd($role,$permissions );
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
        if (!auth()->user()->can('roles.edit')) {
            abort(403, 'Unauthorized action.');
        }

        try{

        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('Role Create Failed');
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
    }

}
