@extends('admin.layout')
@section('container')
    <h1>colors</h1>
    <a href="{{Route('color')}}"><button type="button" class="btn btn-success btn-sm">Add color</button>
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
                        @foreach($color as $color)
                        <tr>
                            <td>{{$color->color}}</td>
                            @if($color->status==1)
                            <td><a href ="{{url('admin/Color/status/0',[$color->id])}}"><button type="button" class="btn btn-primary">Active</button>
                                @else
                                <td><a href ="{{url('admin/Color/status/1',[$color->id])}}"><button type="button" class="btn btn-secondary">DeActive</button>
                                @endif
                        
                            <td><a href ="{{url('admin/Color/edit',[$color->id])}}"><button type="button" class="btn btn-info">
                                <i class="fa fa-edit"></I>
                              </button></td>
                              <td> <li class="list-inline-item">
                                <a href ="{{url('admin/Color/delete',[$color->id])}}"> <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
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