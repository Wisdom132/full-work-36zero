<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:roles');
    }
    

    public function show()
    {
    	$roles = Role::all();
    	return view('cpanel.roles.show', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('cpanel.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
    	$roles = new Role;
    	$roles->role = $request->name;
    	$roles->save();
        $roles->permissions()->sync($request->input('permission'));
        
        return redirect()->route('role.show')->with('success', 'Role created successfully!!');
    }

    public function edit($id)
    {
        $permissions = Permission::all();
        $roles = Role::where('id', $id)->first();
        return view('cpanel.roles.edit', compact('roles', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $roles = Role::where('id', $id)->first();
        $roles->role = $request->name;
        $roles->save();
        $roles->permissions()->sync($request->input('permission'));

        return redirect()->route('role.show')->with('success', 'Role updated successfully!!');
    }

    public function destroy($id)
    {
        $post = Role::where('id', $id)->delete();
        return redirect()->back()->with('delete', 'Role Deleted Successsfully!!');
    }
}
