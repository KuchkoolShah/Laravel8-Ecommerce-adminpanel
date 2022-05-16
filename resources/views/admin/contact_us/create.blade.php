@extends('admin.layouts.index');
@section('css')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.css') }}">
@endsection
@section('content')
 <!-- Content Header (Page header) -->
  <section class="content">
 <form action="{{route('admin.contact.store')}}" method="POST" enctype="multipart/form-data">
    <!-- 2 column grid layout with text inputs for the first and last names -->
    @csrf
  
    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example3">name</label>
      <input type="text" id="form6Example3" name="name" class="form-control" />
     
    </div>
  
    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">Email</label>
      <input type="email" id="form6Example4" name="email" class="form-control" />
     
    </div>
  
    <!-- Email input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example5">Phone Number</label>
      <input type="text" id="form6Example5" name="phone" class="form-control" />
      
    </div>
  
    <!-- Number input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example6">description</label>
    <textarea name="description" id="comment" class="form-control"></textarea>
     
    </div>

    <!-- Message input -->
   
  
<br>
  
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4 mt-2 pt-3">Submit</button>
  </form>
 <section>
@endsection