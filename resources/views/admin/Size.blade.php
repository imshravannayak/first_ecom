@extends('admin.layout')
@section('container')
    <h1>sizes</h1>
    <a href="{{Route('size')}}"><button type="button" class="btn btn-success btn-sm">Add size</button>
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
                            <th>color</th>
                            <th>Status</th>
                           <th>Update</th>
                           <th>Delete</th>

                                    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($size as $size)
                        <tr>
                            <td>{{$size->size}}</td>
                            @if($size->status==1)
                            <td><a href ="{{url('admin/Size/status/0',[$size->id])}}"><button type="button" class="btn btn-primary">Active</button>
                                @else
                                <td><a href ="{{url('admin/Size/status/1',[$size->id])}}"><button type="button" class="btn btn-secondary">DeActive</button>
                                @endif
                        
                            <td><a href ="{{url('admin/Size/edit',[$size->id])}}"><button type="button" class="btn btn-info">
                                <i class="fa fa-edit"></I>
                              </button></td>
                              <td> <li class="list-inline-item">
                                <a href ="{{url('admin/Size/delete',[$size->id])}}"> <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
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