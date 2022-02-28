@extends('admin.layouts.index');

@section('content')
 <!-- Content Header (Page header) -->
 <section class="content">
 <form action="{{route('product.update' , $products->id )}}" method="POST" enctype="multipart/form-data">
    <!-- 2 column grid layout with text inputs for the first and last names -->
    @csrf
  @method('PUT')
    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example3">name</label>
      <input type="text"  name="name"  value="{{$products->name }}" class="form-control" />
     
    </div>
  
    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">Slug</label>
      <input type="text" id="form6Example4" name="slug"  value="{{$products->slug}}" class="form-control" />
     
    </div>
  
    <!-- Email input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example5">image</label>
        <img src= "{{asset('uploads/'. $products->image) }}"  class="img-fluid"height="200px;"  width="100%">
      <input type="file" id="form6Example5" name="image" class="form-control" />
      
      
    </div>
  
    <!-- Number input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example6">description</label>
      <input type="text" id="form6Example6" name="description" value="{{$products->slug ?? ''}}" class="form-control" />
     
    </div>
  

    <!-- Message input -->
    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4"> Price</label>
      <input type="text" id="form6Example4" name="regular_price"  value="{{$products->regular_price}}" class="form-control" />
     
    </div>
     <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">Stock</label>
      <input type="text" id="form6Example4" name="stock_status"  value="{{$products->stock_status}}" class="form-control" />
     
    </div>
     <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">Quantity</label>
      <input type="text" id="form6Example4" name="quantity"  value="{{$products->quantity}}" class="form-control" />
     
    </div>
     <!-- Text input -->
   
     
  
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
  </form>
 <section>
 @endsection