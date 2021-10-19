@extends('admin.layout')
@section('container')
    <h1>product</h1>
    <a href="{{Route('product')}}"><button type="button" class="btn btn-success btn-sm">Add product</button>
    </a>
    @if (Session::has('message'))
    <div class="alert alert-danger" role="alert">
        {{session('message')}} 
    </div>
    @endif
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>image</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->image}}</td>
                            <td>{{$product->slug}}</td>
                            @if($product->status==1)
                            <td><a href ="{{url('admin/product/status/0',[$product->id])}}"><button type="button" class="btn btn-primary">Active</button>
                                @else
                                <td><a href ="{{url('admin/product/status/1',[$product->id])}}"><button type="button" class="btn btn-secondary">DeActive</button>
                                @endif
                            <td><a href ="{{url('admin/product/edit',[$product->id])}}"><button type="button" class="btn btn-info">
                                <i class="fa fa-edit"></I>
                              </button></td>
                              <td> <li class="list-inline-item">
                                <a href ="{{url('admin/product/delete',[$product->id])}}"> <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                            </li>
                            </td>
                            
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->

        </div>
    </div>
    @endsection