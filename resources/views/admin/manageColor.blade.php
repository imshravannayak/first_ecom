@extends('admin.layout')
@section('container')
@if(session()->has('editview'))
<h1>manage color</h1>
<a href="{{url('admin/color')}}"><button type="button" class="btn btn-success btn-sm">Back</button></a>
    <div class= "row m-t-30">
        <div class= "col md-12">
    <div class="row">

    <div class="col-lg-12">
        <div class="card">
            
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">add color</h3>
                </div>
                <hr>
                <form action="{{Route('edit.color')}}" method="post" novalidate="novalidate">@csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">color</label>
                        <input id="color" name="color" type="text" value={{$color->color}} class="form-control" aria-required="true" aria-invalid="false" required>
                        <input type="hidden" name="status" value={{$color->status}}>
                    </div>
                    @error('color')
                
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                   
                    @enderror
                    
               
                    <div>   
                        <input type="hidden" name="id" value={{$color->id}}>
                         <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">Add</span>
                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

 
@else
    <h1>manage color</h1>
    <a href="{{url('admin/color')}}"><button type="button" class="btn btn-success btn-sm">Back</button></a>
        <div class= "row m-t-30">
            <div class= "col md-12">
        <div class="row">
    
        <div class="col-lg-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">add color</h3>
                    </div>
                    <hr>
                    <form action="{{Route('add.color')}}" method="post" novalidate="novalidate">@csrf
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">color</label>
                            <input id="color" name="color" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        @error('title')
                    
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                       
                        @enderror
                        
                       
                        
                        
                        
                       
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                <span id="payment-button-amount">Add</span>
                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif

        @if (Session::has('message'))
        <div class="alert alert-danger" role="alert">
            {{session('message')}}
        </div>
        @endif
    @endsection