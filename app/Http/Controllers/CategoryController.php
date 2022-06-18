<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStore;
use RealRashid\SweetAlert\Facades\Alert;
use session;
class CategoryController extends Controller
{


     public function __construct()
    {
        $this->middleware(function($request,$next){
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
         Alert::success('Category', 'Category  loaded successfully');
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
       $category =Category::create([
        'image' => $imageName ,
           'name'=>$request->name,
           'slug' => $request->slug,
           'description'=>$request->description,
           
          
       ]);

       if($category){

            $category->parents()->attach($request->parent_id,['created_at'=>now(), 'updated_at'=>now()]);
           Alert::success('Category', 'Category add to successfully');

            return redirect(route('admin.category.index'));
       }else{
            return back()->with('message', 'Error Inserting category');
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
        $categories = Category::findOrFail($id);
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
          $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = $request->slug;
        //detach all parent categories
        $category->parents()->detach();
        //attach selected parent categories
        $category->parents()->attach($request->parent_id,['created_at'=>now(), 'updated_at'=>now()]);
        //save current record into database
        $saved = $category->save();
          

            if($saved)

            return redirect()->route('admin.category.index')->with('message','Category add Successfully!');
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

 public function Category_apishow()
    { 
             $categories = Category::all();
        //return view('admin.Category.index',compact('categories'));

      if(count( $categories)>0){
        return response()->json(["status"=>200,'message'=>'category Data','data'=> $categories]);   
      }else{
        return response()->json(["status"=>400,'message'=>'No record found','data'=>[]]);
      }
       
    }

  
}
