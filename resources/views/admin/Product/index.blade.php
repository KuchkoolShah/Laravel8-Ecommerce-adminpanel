@extends('admin.layouts.index');

@section('content')
 <!-- Content Header (Page header) -->
 
 <section class="content-header">
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Data tables</li>
    </ol>
  </section>


 <section class="content">
    <div class="row">
      <div class="col-xs-12">
      
        <div class="box">
          <div class="box-header text-center ">
            <h2 class="box-title text-center"  class="text-center"><a href="{{route('admin.product.create')}}">Add New  Product </a></h2>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row">
                <div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
              <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 183.5px;">ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 219.703px;">Name</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 202.281px;">Slug</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156.703px;">Description
                </th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110.812px;">Image</th>
              </th> 
              <th class="sorting "  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110.812px;">Categories</th>
              <th class="sorting "  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110.812px;">Price</th>
              <th class="sorting "  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110.812px;">Stoct</th><th class="sorting "  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110.812px;">Qunatity</th><th class="sorting "  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110.812px;">Edite</th>
            </tr>
              </thead>
              <tbody>
                @if($products->count() > 0)
      @foreach($products as $product)
              <tr role="row" class="even">
                <td class="sorting_1">{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->slug}}</td>
                <td>{{$product->description}}</td>
                <td> <img src= "{{asset('uploads/'.$product->image) }}"  class="img-fluid" width="100%"> </td>
                <td>
                      @if($product->categories()->count() > 0)
                      @foreach($product->categories as $children)
                      {{$children->name}},
                      @endforeach
                      @else
                      <strong>{{"product"}}</strong>
                      @endif
                    </td>
                 <td>{{$product->regular_price}}</td>
                 <td>{{$product->stock_status}}</td>
                 <td>{{$product->quantity}}</td>
                  <td><a href="{{route('admin.product.edit', $product->id)}}"><span data-toggle="tooltip" data-placement="top" title="Edit" class="glyphicon glyphicon-edit"></span><a>|
                <form id="delete-form-{{ $product->id }}" method="post" action="{{ route('admin.product.destroy',$product->id) }}" style="display: none">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                </form>
                <a href="" onclick="
                if(confirm('Are you sure, You Want to delete this?'))
                    {
                      event.preventDefault();
                      document.getElementById('delete-form-{{ $product->id }}').submit();
                    }
                    else{
                      event.preventDefault();
                    }" ><span  data-toggle="tooltip" data-placement="top" title="Delete" class="glyphicon glyphicon-trash"></span></a></td>
            
        
               
              </tr>
              @endforeach
              @else
              <tr>
                <td colspan="7" class="alert alert-info">No products Found..</td>
              </tr>
              @endif
            </tbody>
              <tfoot>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 183.5px;">ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 219.703px;">Name</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 202.281px;">Slug</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156.703px;">Description
                </th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110.812px;">Image</th>
              </th><th class="sorting "  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110.812px;">Price</th><th class="sorting "  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110.812px;">Stoct</th><th class="sorting "  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110.812px;">Qunatity</th><th class="sorting "  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110.812px;">Edit</th>
            </tr>
              </tfoot>
            </table>

            </div></div>

            <div class="row"><div class="col-sm-5">
              <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
            </div>
            <div class="col-sm-7">
              <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                <ul class="pagination">
                  
                  <li class="paginate_button previous " id="example1_previous">
                    {{$products->links()}}
                  </li>
                

                

                </ul></div></div></div></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
@endsection