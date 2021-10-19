@extends('admin.layout')
@section('container')
@if(session()->has('editview'))
<h1>manage coupon</h1>
<a href="{{url('admin/Coupon')}}"><button type="button" class="btn btn-success btn-sm">Back</button></a>
    <div class= "row m-t-30">
        <div class= "col md-12">
    <div class="row">

    <div class="col-lg-12">
        <div class="card">
            
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">add coupon</h3>
                </div>
                <hr>
                <form action="{{Route('edit.coupon')}}" method="post" novalidate="novalidate">@csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Title</label>
                        <input id="title" name="title" type="text" value={{$coupon->title}} class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    @error('title')
                
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                   
                    @enderror
                    
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">Code</label>
                        <input id="Code" name="code" type="text" value={{$coupon->code}} class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                            autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                    </div>
                    @error('code')
                
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                   
                    @enderror
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">Value</label>
                        <input id="value" name="value" type="text" value={{$coupon->value}} class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                            autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                    </div>
                   
                    @error('value')
                
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                   
                    @enderror
                    
                    
                   
                    <div>
                        <input type="hidden" name="id" value={{$coupon->id}}>
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
    <h1>manage coupon</h1>
    <a href="{{url('admin/Coupon')}}"><button type="button" class="btn btn-success btn-sm">Back</button></a>
        <div class= "row m-t-30">
            <div class= "col md-12">
        <div class="row">
    
        <div class="col-lg-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">add coupon</h3>
                    </div>
                    <hr>
                    <form action="{{Route('add.coupon')}}" method="post" novalidate="novalidate">@csrf
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Title</label>
                            <input id="title" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        @error('title')
                    
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                       
                        @enderror
                        
                        <div class="form-group has-success">
                            <label for="cc-name" class="control-label mb-1">Code</label>
                            <input id="Code" name="code" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                        </div>
                        @error('code')
                    
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                       
                        @enderror
                        <div class="form-group has-success">
                            <label for="cc-name" class="control-label mb-1">Value</label>
                            <input id="value" name="value" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                        </div>
                       
                        @error('value')
                    
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