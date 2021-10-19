@extends('admin.layout')
@section('container')
@if(session()->has('editview'))
    <h1>Update Category</h1>
    <a href="category"><button type="button" class="btn btn-success btn-sm">Back</button></a>
        <div class= "row m-t-30">
            <div class= "col md-12">
        <div class="row">
    
        <div class="col-lg-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">add category</h3>
                    </div>
                    <hr>
                    <form action="{{Route('edit.category')}}" method="post" novalidate="novalidate">@csrf
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Category name</label>
                            <input id="category_name" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$category->category_name}}" required>
                        </div>
                        @error('category_name')
                    

                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                        
                        <div class="form-group has-success">
                            <label for="cc-name" class="control-label mb-1">slug</label>
                            <input id="slug" name="slug" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="{{$category->category_name}}">
                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                        </div>
                        @error('slug')

                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                       
                        <div>
                            <input type="hidden" name="id" value={{$category->id}}>
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
    <h1>manage</h1>
    <a href="category"><button type="button" class="btn btn-success btn-sm">Back</button></a>
        <div class= "row m-t-30">
            <div class= "col md-12">
        <div class="row">
    
        <div class="col-lg-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">add category</h3>
                    </div>
                    <hr>
                    <form action="{{Route('add.category')}}" method="post" novalidate="novalidate">@csrf
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Category name</label>
                            <input id="category_name" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        @error('category_name')
                    

                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                        
                        <div class="form-group has-success">
                            <label for="cc-name" class="control-label mb-1">slug</label>
                            <input id="slug" name="slug" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                        </div>
                        @error('slug')

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

        
    @endsection