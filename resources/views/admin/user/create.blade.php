@extends('admin.layouts.index');

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="">Dashboard</a></li>
<li class="breadcrumb-item "><a href="">users</a></li>
<li class="breadcrumb-item active" aria-current="page">Add/Edit users</li>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('admin/select2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('admin/select2/select2.min.css') }}">	

<script src="{{asset('admin/select2/select2.js') }}"></script>
<script src="{{asset('admin/jquery/jquery.min.js') }}"></script>
<script src="{{asset('admin/select2/select2.full.js') }}"></script>		
<script src="{{asset('admin/select2/select2.min.js')}}"></script>

@endsection
@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2"> 
<h2 class="modal-title">Add  users</h2>
<div class="form-settng"> </div>
<form  action="{{route('admin.profile.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="ml-5 pl-5">
	<div class="row">
		@csrf
		
		<div class="col-md-6">
			<div class="form-group row">
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
				<div class="col-sm-12">
					@if (session()->has('message'))
					<div class="alert alert-success">
						{{session('message')}}
					</div>
					@endif
				</div>
				<div class="col-sm-12 col-md-6">
					<label class="form-control-label">Name: </label>
					<input type="text" id="txturl" name="name" class="form-control " value="" />
					
			</div>
			<div class="col-sm-12 col-md-6">
				<label class="form-control-label">Email: </label>
				<input type="text" id="email" name="email" class="form-control " value="" />

			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-12 col-md-6">
				<label class="form-control-label">Password: </label>
				<input type="password" id="password" name="password" class="form-control " value="" />

			</div>
			<div class="col-sm-12 col-md-6">
				<label class="form-control-label">Re-Type Password: </label>
				<input type="password" id="password_confirm" name="password_confirm" class="form-control " value="" />

			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-6">
				<label class="form-control-label">Status</label>
				<div class="input-group mb-3">
					<select class="form-control" id="status" name="status">
						<option value="0" @if(isset($user) && $user->status == 0) {{'selected'}} @endif >Blocked</option>
						<option value="1" @if(isset($user) && $user->status == 1) {{'selected'}} @endif>Active</option>
					</select>
				</div>
			</div>
			@php
			$ids = (isset($user->role) && $user->role->count() > 0 ) ? array_pluck($user->role->toArray(), 'id') : null;
			@endphp

			<div class="col-sm-6">
				<label class="form-control-label">Select Role</label>
				<select name="role_id" id="role" class="form-control">
					@if($roles->count() > 0)
					@foreach($roles as $role)
					<option value="{{$role->id}}"
						@if(!is_null($ids) && in_array($role->id, $ids))
						{{'selected'}}
					@endif>{{$role->name}}</option>
					@endforeach
					@endif
				</select>
			</div>
		</div>
		
		<div class="form-group row">
			<div class="col-sm-12">
				<label class="form-control-label">Address: </label>
				<div class="input-group mb-3">
					<input type="text" name="address" class="form-control " value="" />
				</div>
			</div>
		</div>
		<div class="form-group row">
 <select name="country_id" class="form-control" id="countries">
						<option value="0">Select a Country</option>
						@foreach($countries as $country)
						<option value="{{$country->id}}">{{$country->name}}</option>
						@endforeach
					</select>
				<br>
			<select name="state_id" class="form-control" id="states">
						<option value="0">Select a State</option>
					</select>

					<br>
			<select class="form-control my-2"id="city">
			  <option value="0">Small select</option>
			</select>
		</div>
	</div>
	<div class="col-lg-3">
		<ul class="list-group row">

			<li class="list-group-item active"><h5>Profile Image</h5></li>
			<li class="list-group-item">
				<div class="input-group mb-3">
					<div class="custom-file ">
						<input type="file"  class="custom-file-input" name="image" id="thumbnail" required autocomplete="">
						<label class="custom-file-label" for="thumbnail">Choose file</label>
					</div>
				</div>
				<div class="img-thumbnail  text-center">
					<img src="@if(isset($user)) {{asset('storage/'.$user->thumbnail)}} @else {{asset('images/no-thumbnail.jpeg')}} @endif" id="imgthumbnail" class="img-fluid" alt="">
				</div>
			</li>
			<li class="list-group-item">
				<div class="form-group row">
					<div class="col-lg-12">
						@if(isset($user))
						<input type="submit" name="submit" class="btn btn-primary btn-block " value="Update user" />
						@else
						<input type="submit" name="submit" class="btn btn-primary btn-block " value="Add user" />
						@endif
					</div>

				</div>
			</li>
		</ul>
	</div>
</div>
</form>

</div></div>
@endsection
@section('scripts')

<script  type="text/javascript">
			$('#countries').select2().trigger('change');
			$('#states').select2();
			$('#city').select2();
		
   $('#countries').on('change', function(){
				console.log("country chang");
						   var id = $('#countries').select2('data')[0].id;
							$('#states').val(null);
							$('#states option').remove();
					   var studentSelect = $('#states');
				$.ajax({
					type: 'GET',
					url: "{{route('admin.profile.states')}}/" + id
				}).then(function (data) {
					// create the option and append to Select2
					
					for(i=0; i< data.length; i++){
							var item = data[i]
							var option = new Option(item.name, item.id, true, true);
							studentSelect.append(option);
						}
					//var option = new Option(data.full_name, data.id, true, true);
					studentSelect.trigger('change');

					// manually trigger the `select2:select` event
					
				});
			})

			// statechange in onclick function
			$('#states').on('change', function(){
	var id = $('#states').select2('data')[0].id;
	// Fetch the preselected item, and add to the control
	var studentSelect = $('#city');
	$('#city').val(null);
	$('#city option').remove();
$.ajax({
type: 'GET',
url: "{{route('admin.profile.cities')}}/" + id
}).then(function (data) {
	// create the option and append to Select2
	for(i=0; i< data.length; i++){
		var item = data[i]
		var option = new Option(item.name, item.id, false, false);
		studentSelect.append(option);
	}
	});
studentSelect.trigger('change');
})
			
		
		</script>
 
@endsection