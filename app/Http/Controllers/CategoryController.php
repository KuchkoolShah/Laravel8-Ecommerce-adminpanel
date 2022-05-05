<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.Category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
                            }
            $category = new Category;
            $category->image = $imageName;
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->description= $request->description;
            $category->parents()->attach($request->parent_id,['created_at'=>now(), 'updated_at'=>now()]);
            $saved = $category->save();
            if($saved)
            return back()->with('message','Category add Successfully!');
        else
            return back()->with('message', 'Error Updating Category');
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
        $categories = Category::first();
        return view('admin.Category.edit',compact('categories'));
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
         $category = Category::find($id);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
                            }
            
            $category->image = $imageName;
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->description= $request->description;
           
            $saved = $category->save();
            if($saved)
            return redirect()->route('category.index')->with('message','Category add Successfully!');
        else
            return back()->with('message', 'Error Updating Category');
    
    }



///// 
public function trash()
    {
        $categories = Category::onlyTrashed()->paginate(3);
        return view('admin.category.index', compact('categories'));
    }


    public function recoverCat($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        if($category->restore())
            return back()->with('message','Category Successfully Restored!');
        else
            return back()->with('message','Error Restoring Category');
    }

    public function remove(Category $category)
    {
        if($category->delete()){
            return back()->with('message','Category Successfully Trashed!');
        }else{
            return back()->with('message','Error Deleting Record');
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
        $category = Category::find($id);
        $category->delete();
      
  
        return redirect()->route('category.index');
    }


  
}
