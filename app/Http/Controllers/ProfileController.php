<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
	public function index($id)
	{
		$profile = User::find($id);
		return view('cpanel.profile', compact('profile'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255'],
			
			
		]);

		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$extension = $file->getClientOriginalExtension();	
			Storage::disk('public')->put($file->getFilename().'.'.$extension,  File::get($file));	
		}


		$profile = User::where('id', $id)->first();
		$profile->name 			  = $request->name;
		$profile->email 		  = $request->email;
		$profile->phone_no 		  = $request->phone_no;
		$profile->state_of_origin = $request->state_of_origin;
		if ($request->password == true ) {
			$profile->password = Hash::make($request->password);
		}
		if ($request->hasFile('image')) {
			$profile->image    = $file->getFilename().'.'.$extension;
		}

		$profile->save();

		return redirect()->back()->with('success', 'profile updated successfully!!');

	}

}
