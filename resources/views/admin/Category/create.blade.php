@extends('admin.layouts.index');
@section('css')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.css') }}">
@endsection
@section('content')
 <!-- Content Header (Page header) -->
 <section class="content">

       @include('sweetalert::alert')                 
 <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
    <!-- 2 column grid layout with text inputs for the first and last names -->
    @csrf
  

  <div class="col-sm-12">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
        </div>
    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example3">name</label>
      <input type="text" id="form6Example3" name="name"  class="form-control @error('name') is-invalid @enderror" required/>
          @error('name')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror

     
    </div>
  
    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">Slug</label>
      <input type="text" id="form6Example4" name="slug" class="form-control" />
     
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
  
    <div class="form-outline mb-4">
      <label class="form-control-label">Select Category: </label>
      <select class="js-example-basic-multiple  form-control" name="parent_id[]" multiple>
		
				@if(isset($categories))
				<option value="0">Top Level</option>
				@foreach($categories as $cat)
				<option value="{{$cat->id}}">{{$cat->name ??''}}</option>
				@endforeach
				@endif
			</select>
    </div>
    <!-- Message input -->
   
  <br>

  
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
  </form>
 <section>
 @endsection

 @section('script')
<script src="{{ asset('admin/plugins/select2/select2.full.js') }}"></script>
<script src="{{ asset('admin/plugins/select2/select2.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endsection