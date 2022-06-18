<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\carousel;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products = product::all();
        return view('admin.Product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    
    public function single(Product $product){
      return view('products.single', compact('product'));
    }

    public function create()
    {
       $categories = Category::all();
        return view('admin.Product.create',compact('categories'));
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
            
       $product = Product::create([
           'name'=>$request->name,
           'slug' => $request->slug,
           'description'=>$request->description,
            'SKU'=>$request->SKU,
           'image' => $imageName ,  
            'stock_status'=> $request->stock_status,
            'quantity'=> $request->quantity,
             'regular_price'=>$request->regular_price,
          
       ]);
    
       if($product){
            $product->categories()->attach($request->category_id,['created_at'=>now(), 'updated_at'=>now()]);
            return redirect(route('admin.product.index'))->with('message', 'Product Successfully Added');
       }else{
            return back()->with('message', 'Error Inserting Product');
       }
        // if ($request->hasFile('image')) {
        //     $imageName = time() . '.' . $request->image->extension();
        //     $request->image->move(public_path('uploads'), $imageName);
        //                     }
            
        //     $product->image = $imageName;
        //     $product->name = $request->name;
        //     $product->slug = $request->slug;
        //      $product->SKU = $request->SKU;
        //     $product->regular_price=$request->regular_price;
        //     $product->stock_status= $request->stock_status;
        //     $product->quantity= $request->quantity;
        //     $product->description= $request->description;
        //     //dd($product);
        //     $saved = $product->save();

        //     if($saved)
        //     return redirect()->route('product.admin.index')->with('message','product update Successfully!');
        // else
        //     return back()->with('message', 'Error Updating Product');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
         $categories = Category::with('childrens')->get();
       $products = Product::with('categories')->paginate(3);
       return view('products.all', compact('categories','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
          $products = Product::first();
       return view('admin.Product.edit' , compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //dd($request->all());
        $product = Product::find($id);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
                            }
            
            $product->image = $imageName;
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->regular_price=$request->regular_price;
            $product->stock_status= $request->stock_status;
            $product->quantity= $request->quantity;
            $product->description= $request->description;
            //dd($product);
            $saved = $product->save();

            if($saved)
            return redirect()->route('product.index')->with('message','product update Successfully!');
        else
            return back()->with('message', 'Error Updating Product');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }


     public function show_home()
    {
        $producted = product::paginate(5);
       
          $products = Product::paginate(5);
         $carousel = carousel::all();
         return view('customer.home' , compact('carousel' , 'products' , 'producted'));
    }


     public function about_products(Product $product)
    {
       return view('customer.abouts');
    }

     public function contact_products(Product $product)
    {
       return view('customer.contact');
    }


     public function shop_products(Product $product)
    {
        $categories = Category::paginate(6);
       $producted = product::paginate(15);
        $popular_product = Product::inRandomOrder()->limit(5)->get();
        return view('customer.shop',compact('producted' , 'categories' , 'popular_product'));
    }

   public function details($id)
    {
       $products = Product::with('categories')->first();
       return view('customer.detail', compact('products'));
    }


  

}
