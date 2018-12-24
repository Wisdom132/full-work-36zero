<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		$admins = User::all()->sortByDesc('created_at');	
		return view('cpanel/admins/show', compact('admins'));
	}

	public function create()
	{
		if (Auth::user()->can('admin.create')) {
			$roles = Role::all();
			$admins = User::all();
			return view('cpanel.admins.create', compact('admins', 'roles'));
		}

		return redirect(route('home_view'));
	}

	public function store(Request  $request)
	{
		$request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:6', 'confirmed'],
		]);

		$admins = new User;
		$admins->name = $request->name;
		$admins->image = 'default.png';
		$admins->email = $request->email;
		$admins->phone_no = $request->phone_no;
		$admins->state_of_origin = $request->state_of_origin;
		$admins->password = Hash::make($request->password);
		$admins->save();
		$admins->roles()->sync($request->input('roles'));

		return redirect()->route('admin.index')->with('success', 'Admin created successfully');
	}

	public function edit($id)
	{
		if (Auth::user()->can('admin.update')) {
			$roles = Role::all();
			$admins = User::find($id);
			return view('cpanel.admins.edit', compact('admins', 'roles'));
		}
		return redirect(route('home_view'));

	}

	public function update(Request $request, $id)
	{

		$request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255'],
			'password' => ['confirmed'],
			
		]);

		$admins = User::where('id', $id)->first();
		$admins->name = $request->name;
		$admins->email = $request->email;
		$admins->phone_no = $request->phone_no;
		$admins->state_of_origin = $request->state_of_origin;
		if ($request->password == true) {
			$admins->password = Hash::make($request->password);
		}
		
		$admins->save();
		$admins->roles()->sync($request->input('roles'));

		return redirect()->route('admin.index')->with('success', 'Admin updated successfully');
	}

	public function destroy($id)
	{
		$post = User::where('id', $id)->delete();
		return redirect()->back()->with('delete', 'Admin Deleted Successsfully!!');
	}
}
