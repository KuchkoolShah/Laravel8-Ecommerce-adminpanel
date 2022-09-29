@extends('admin.layouts.index');
@section('css')
<link rel="stylesheet" href="{{ asset('admin/select2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('admin/select2/select2.min.css') }}"> 

<script src="{{asset('admin/select2/select2.js') }}"></script>
<script src="{{asset('admin/jquery/jquery.min.js') }}"></script>
<script src="{{asset('admin/select2/select2.full.js') }}"></script>   
<script src="{{asset('admin/select2/select2.min.js')}}"></script>

@endsection
@section('content')
 <!-- Content Header (Page header) -->
 <section class="content">
 <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
    <!-- 2 column grid layout with text inputs for the first and last names -->
    @csrf

    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example3">name</label>
      <input type="text"  name="name"  class="form-control" />
     
    </div>
  
    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">Slug</label>
      <input type="text" id="form6Example4" name="slug" class="form-control" />
     
    </div>
     <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">SKU</label>
      <input type="text" id="form6Example4" name="SKU" class="form-control" />
     
    </div>
  
    <!-- Email input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example5">image</label>
        
      <input type="file" id="form6Example5" name="image" class="form-control" />
      
      
    </div>
  
    <!-- Number input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example6">description</label>
      <input type="text" id="form6Example6" name="description" class="form-control" />
     
    </div>
  

    <!-- Message input -->
    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4"> Price</label>
      <input type="text" id="form6Example4" name="price" class="form-control" />
     
    </div>
     <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">Stock</label>
      <input type="text" id="form6Example4" name="stock_status"   class="form-control" />
     
    </div>
     <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">Quantity</label>
      <input type="text" id="form6Example4" name="quantity"   class="form-control" />
     
    </div><br>
      <!-- Text input -->
    <div class="form-outline mb-4">
      @php
      $ids = (isset($product) && $product->categories->count() > 0 ) ? array_pluck($product->categories->toArray(), 'id') : null;
      @endphp
       <label class="form-label" for="form6Example4">Select a category</label>
        <select name="category_id[]" id="select2" class="form-control" >
          @if($categories->count() > 0)
          @foreach($categories as $category)
          <option value="{{$category->id}}"
            @if(!is_null($ids) && in_array($category->id, $ids))
            {{'selected'}}
            @endif
          >{{$category->name}}</option>
          @endforeach
          @endif
        </select>
    </div>
     <!-- Text input -->
   
     <br>
  
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Sumit Record</button>
  </form>
 <section>
 @endsection
 @section('scripts')
<script type="text/javascript">
  $('#select2').select2({
      placeholder: "Select multiple Categories",
    allowClear: true
    });
  </script>
@endsection