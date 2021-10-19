@extends('admin.layout')
@section('container')
@if(session()->has('editview'))
    <h1>Update product</h1>
    <a href="{{url('admin/Product')}}"><button type="button" class="btn btn-success btn-sm">Back</button></a>
        <div class= "row m-t-30">
            <div class= "col md-12">
        <div class="row">
    
        <div class="col-lg-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">add product</h3>
                    </div>
                    <hr>
                    <form action="{{Route('edit.product')}}" method="post" novalidate="novalidate">@csrf
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">product name</label>
                            <input id="product_name" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$product->product_name}}" required>
                        </div>
                        @error('product_name')
                    

                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                        
                        <div class="form-group has-success">
                            <label for="cc-name" class="control-label mb-1">slug</label>
                            <input id="slug" name="slug" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="{{$product->product_name}}">
                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                        </div>
                        @error('slug')

                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                       
                        <div>
                            <input type="hidden" name="id" value={{$product->id}}>
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
    <a href="product"><button type="button" class="btn btn-success btn-sm">Back</button></a>
        <div class= "row m-t-30">
            <div class= "col md-12">
        <div class="row">
    
        <div class="col-lg-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">add product</h3>
                    </div>
                    <hr>
                    <form action="{{Route('add.product')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">@csrf
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">category</label>
                            <select id="category" name="category" type="file" class="form-control" aria-required="true" aria-invalid="false" required>
                            <option>select category<option>
                                @foreach ($result_cat as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}<option> 
                                    @endforeach
                            </select>
                        
                            </div>

                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">product name</label>
                            <input id="name" name="name" type="text" value="{{$name}}" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                       

                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">image</label>
                            <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        @error('image')

                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror

                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">model</label>
                            <input id="model" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>

                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">brand</label>
                            <input id="brand" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>

                        <div class="form-text">
                            <label for="cc-payment" class="control-label mb-1">short description</label>
                            <textarea id="short_desc" name="short_desc" type="text" class="form-control" rows="2" aria-required="true" aria-invalid="false" required></textarea>
                        </div>
                        <div class="form-text">
                            <label for="cc-payment" class="control-label mb-1"> description</label>
                            <textarea id="desc" name="desc" type="text" class="form-control" rows="2" aria-required="true" aria-invalid="false" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">keyword</label>
                            <input id="keyword" name="keyword" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>

                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">specification</label>
                            <input id="specification" name="specification" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">uses</label>
                            <input id="uses" name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">warrenty</label>
                            <input id="warrenty" name="warrenty" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        
                    
                        <div class="form-group has-success">
                            <label for="cc-name" class="control-label mb-1">slug</label>
                            <input id="slug" name="slug" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                        </div>
                        <!-- product attributes start-->
                    <div id="product_attr">
                        <div  class="col-lg-12">
                        <div  class="card">
                            <div class="card-body">
                                <h5>attributes</h5>
                            <div class="row">
                                <div class="form-group col-lg-3 ">
            
                                    <label for="cc-payment" class="control-label mb-1 ">sku</label>
                                    <input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    
                                </div>
                                <div class="form-group col-lg-3 ">
            
                                    <label for="cc-payment" class="control-label mb-1 ">image</label>
                                    <input id="image" name="image_attr[]" type="file" class="form-control" aria-required="true" aria-invalid="false" required>
                                
                                </div>
                            </div>
                                <div class="row">
                                <div class="form-group col-lg-3 ">
            
                                    <label for="cc-payment" class="control-label mb-1 ">Mrp</label>
                                    <input id="Mrp" name="Mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    
                                </div>
                                <div class="form-group col-lg-3 ">
            
                                    <label for="cc-payment" class="control-label mb-1 ">Price</label>
                                    <input id="Price" name="Price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    
                                </div>
                                <div class="form-group col-lg-3 ">
            
                                    <label for="cc-payment" class="control-label mb-1 ">Quantity</label>
                                    <input id="qty" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    
                                </div>
                                </div>
                                <div class="form-group col-lg-4">
                                 <label for="cc-payment" class="control-label mb-1">Color</label>
                                  <select id="color" name="color[]" type="file" class="form-control" aria-required="true" aria-invalid="false" required>
                                    <option>select color<option>
                                        @foreach ($result2 as $color)
                                        <option value="{{$color->id}}">{{$color->color}}<option> 
                                            @endforeach
                                    </select>
                                
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="cc-payment" class="control-label mb-1">size</label>
                                     <select id="size" name="size[]" type="file" class="form-control" aria-required="true" aria-invalid="false" required>
                                       <option>select size<option>
                                           @foreach ($result1 as $size)
                                           <option value="{{$size->id}}">{{$size->size}}<option> 
                                               @endforeach
                                       </select>
                                   
                                   </div>
                            </div>
                            <div class="form-group col-lg-4">
                            <button type="button" id="add" class="btn btn-primary btn-sm " onclick="myFunction()">Add more</button>
                            </div>
                        </div>
                    </div>
                </div>
                       
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
        @if (Session::has('message'))
        <div class="alert alert-danger" role="alert">
            {{session('message')}}
        </div>
        @endif
        
@endif
<script>
    var loop_count=1;
    function myFunction() {
        loop_count++;
        var html='<div  class="card" id="add_remove_'+loop_count+'"><div class="card-body"><h5>attributes</h5><div class="row"><div class="form-group col-lg-3 ">';
        html+='<label for="cc-payment" class="control-label mb-1 ">sku</label><input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required>';
        html+='<div class="form-group col-lg-10 "><label for="cc-payment" class="control-label mb-1 ">image</label><input id="image" name="image_attr[]" type="file" class="form-control" aria-required="true" aria-invalid="false" required></div>';
        html+='</div><div class="row"><div class="form-group col-lg-3 "><label for="cc-payment" class="control-label mb-1 ">Mrp</label><input id="Mrp" name="Mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';
        html+='<div class="form-group col-lg-3 "><label for="cc-payment" class="control-label mb-1 ">Price</label><input id="Price" name="Price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div><div class="form-group col-lg-3 "><label for="cc-payment" class="control-label mb-1 ">Quantity</label><input id="qty" name="qty" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div></div>';
        var color_html=$('#color').html();
        html+='<div class="form-group col-lg-4"><label for="cc-payment" class="control-label mb-1">Color</label><select id="color" name="color[]" type="file" class="form-control" aria-required="true" aria-invalid="false" required>'+color_html+'</select></div>';
        var size_html=$('#size').html();
        html+='<div class="form-group col-lg-4"><label for="cc-payment" class="control-label mb-1">size</label><select id="size" name="size[]" type="file" class="form-control" aria-required="true" aria-invalid="false" required>'+size_html+'</select></div>';
        html+='</div><div class="form-group col-lg-4"><button type="button" id="remove" class="btn btn-danger btn-sm " onclick="remove_add('+loop_count+')">Remove</button></div>';
        html+='</div></div></div>';
        
      $("#product_attr").append(html);
      
      
    }
    function remove_add(loop_count){
     //alert('hh');
     $('#add_remove_2').remove();  
    }
</script>

    @endsection