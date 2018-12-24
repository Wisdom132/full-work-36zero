<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function show()
    {
       $categories = Category::all();
       return view('cpanel.category.categories')->with('categories', $categories);
   }


   public function create()
   {
       return view('cpanel.category.create');
   }

   public function store(Request $request)
   {
       $this->validate($request, [
        'name' => 'required',
    ]);

       $categories = new Category;
       $categories->name = $request->name;
       $categories->slug = $request->slug;
       $categories->save();

       return redirect()->route('categories')->with('success', 'category created successfully!!');
   }

   public function edit($id)
   {
    $cats = Category::find($id);
    return view('cpanel.category.edit', compact('cats'));
}   

public function update(Request $request, $id)
{
    $this->validate($request, [
        'name' => 'required',

    ]);

    $categories = Category::where('id', $id)->first();
    $categories->name = $request->name;
    $categories->slug = $request->slug;
    $categories->save();

    return redirect()->route('categories')->with('success', 'Category updated successfully!!');
}

  public function destroy($id)
  {
    $post = Category::where('id', $id)->delete();
    return redirect()->back()->with('delete', 'Category Deleted Successsfully!!');
  }
}
