@extends('admin.layouts.index');

@section('breadcrumbs')
  <li class="breadcrumb-item"><a href="">Dashboard</a></li>
 <li class="breadcrumb-item active" aria-current="page">Order</li>
@endsection
@section('content')
  <div class="row d-block">
    <div class="col-sm-12">
      @if (session()->has('message'))
      <div class="alert alert-success">
        {{session('message')}}
      </div>
      @endif
    </div>
  </div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2 class="h2">Order List</h2>

  <div class="btn-toolbar mb-2 mb-md-0">
    <a href="" class="btn btn-sm btn-outline-secondary">
      Add order
    </a>
  </div>
</div>
<div class="table-responsive   table-sm">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Status</th>
        <th>Price</th>
        <th>payement</th>
        <th>Date Created</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @if(isset($Order) && $Order->count() > 0)
      @foreach($Order as $order)
      <tr>
        <td>{{@$order->id}}</td>
       
        <td>{{@$order->user->name}}</td>
        <td>{{@$order->product_id}}</td>
        <td>{{$order->qty}}</td>
        <td class="label label-warning mt-2 pt-4">{{@$order->status}}</td>
        <td>{{@$order->price}}</td>
         <td>{{@$order->payment_id}}</td>
         <td>{{@$order->created_at}}</td>
         <td><span data-toggle="tooltip" data-placement="top" title="Edit" class="glyphicon glyphicon-edit">||<span  data-toggle="tooltip" data-placement="top" title="Delete" class="glyphicon glyphicon-trash"></span></span>
         </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td colspan="7" class="alert alert-info">No Order Found..</td>
      </tr>
      @endif

    </tbody>

  </table>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
  function confirmDelete(id){
    let choice = confirm("Are You sure, You want to Delete this order ?")
    if(choice){
      document.getElementById('delete-order-'+id).submit();
    }
  }
</script>
@endsection