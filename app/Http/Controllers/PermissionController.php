<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:permissions');
    }
    
    public function show()
    {
    	$permissions = Permission::all();
    	return view('cpanel.permissions.show', compact('permissions'));
    }

    public function create()
    {
    	return view('cpanel.permissions.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'for' => 'required'
        ]);
        
        $permissions = new Permission;
        $permissions->name = $request->name;
        $permissions->for = $request->for;
        $permissions->save();
        return redirect()->route('permission.show')->with('success', 'Permission created successfully!!');
    }

    public function edit($id)
    {
        $permissions =  Permission::find($id);
        return view('cpanel.permissions.edit',  compact('permissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'for' => 'required'
        ]);
        
        $permissions = Permission::where('id', $id)->first();
        $permissions->name = $request->name;
        $permissions->for = $request->for;
        $permissions->save();

        return redirect()->route('permission.show')->with('success', 'Permission updated successfully!!');
    }

    public function destroy($id)
    {
        $post = Permission::where('id', $id)->delete();
        return redirect()->back()->with('delete', 'Permission Deleted Successsfully!!');
    }
}
