@extends('admin.layouts.index');

@section('content')
 <!-- Content Header (Page header) -->
 <section class="content">
 <form action="{{route('admin.category.update' , $categories->id )}}" method="POST" enctype="multipart/form-data">
    <!-- 2 column grid layout with text inputs for the first and last names -->
    @csrf
  @method('PUT')
    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example3">name</label>
      <input type="text"  name="name"  value="{{$categories->name ?? ''}}" class="form-control" />
     
    </div>
  
    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">Slug</label>
      <input type="text" id="form6Example4" name="slug"  value="{{$categories->slug ?? ''}}" class="form-control" />
     
    </div>
  
    <!-- Email input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example5">image</label>
        <img src= "{{asset('uploads/'. $categories->image) }}"  class="img-fluid"height="200px;"  width="100%">
      <input type="file" id="form6Example5" name="image" class="form-control" />
      
      
    </div>
  
    <!-- Number input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example6">description</label>
      <input type="text" id="form6Example6" name="description" value="{{$categories->slug ?? ''}}" class="form-control" />
     
    </div>
  
   
    <div class="form-outline mb-4">
      <label class="form-control-label">Select Category: </label>
			<select name="parent_id[]" id="parent_id" class="form-control" multiple>
			 @if(isset($categories))
        <option value="0">Top Level</option>
        @foreach($categories as $cat)
        <option value="{{$cat->id ??''}}">{{$cat->name ??''}}</option>
        @endforeach
        @endif
			</select>
    </div>
    <!-- Message input -->
   
  

  
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
  </form>
 <section>
 @endsection