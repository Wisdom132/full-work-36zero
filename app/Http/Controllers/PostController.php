<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function home()
	{
		$posts = Post::all()->sortByDesc('created_at');
		return view('cpanel/posts/home', compact('posts'));
	}

	public function show(Request $request)
	{
		if (Auth::user()->can('posts.create')) {
			$categories = Category::all();
			$slug = Str::slug($request->get('title'));
			return view('cpanel/posts/create', compact('categories', 'slug'));
		}
		return view('cpanel.posts.create');
	}

	public function create(Request $request)
	{
		// dd(Auth::user()->name);
		$request->validate([
			'body'  => 'required',
			'title' => 'required',
		]);

		if ($request->hasFile('file')) {
			$file 	   = $request->file('file');
			$extension = $file->getClientOriginalExtension();
			Storage::disk('public')->put($file->getFilename().'.'.$extension,  File::get($file));	
		}

		$post = new Post;
		$post->title       = $request->input('title');
		$post->slug    	   = $request->input('slug');
		$post->body   	   = $request->input('body');
		$post->posted_by   = Auth::user()->name;
		$post->image  	   = $file->getFilename().'.'.$extension;
		$post->save();
		$post->categories()->sync($request->input('categories'));

		return redirect()->route('home_view')->with('success', 'Post created succcessfully!!');
		

	}

	public function edit($id)
	{
		$categories = Category::all();
		$posts = Post::find($id);
		return view('cpanel.posts.edit', compact('posts', 'categories'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'body'  => 'required',
			'title' => 'required',
		]);

		if ($request->hasFile('file')) {
			$file 	   = $request->file('file');
			$extension = $file->getClientOriginalExtension();
			Storage::disk('public')->put($file->getFilename().'.'.$extension,  File::get($file));	
		}

		$post = Post::where('id', $id)->first();
		$post->title       = $request->input('title');
		$post->slug    	   = $request->input('slug');
		$post->body   	   = $request->input('body');
		$post->posted_by   = Auth::user()->name;
		if ($request->hasFile('file')) {
			$post->image  	   = $file->getFilename().'.'.$extension;
		}
		$post->save();
		$post->categories()->sync($request->input('categories'));

		return redirect()->route('home_view')->with('success', 'Post updated succcessfully!!');
	}

	public function destroy($id)
	{
		$post = Post::where('id', $id)->delete();
		return redirect()->back()->with('delete', 'Post Deleted Successsfully!!');
	}
}
