@extends('admin.layout.master')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">

                <section class="file-browser">

                    <div class="row match-height">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">

                                <div class="card-block">
                                    <div class="card-body">
                                        <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                                                  enctype="multipart/form-data">
                                                  @csrf
                                                  @method('PUT')

                                            <fieldset class="form-group">
                                                <div class="col-sm-7">
                                                    @error('category_id')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="form-group">
                                                        <label for="issueinput5">Category Name</label>
                                                        <select id="issueinput5" name="category_id" class="form-control"
                                                            data-toggle="tooltip" data-trigger="hover" data-placement="top"
                                                            data-title="Car Brand">
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->{"name_" . App::getLocale()}  }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-body col-12"
                                                    style="display: flex; flex-direction: row; justify-content: space-between;">
                                                    <div class="col-sm-6">
                                                        @error('name_en')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <label>Product Name En</label>
                                                        <div class="position-relative">
                                                            <fieldset class="form-group">
                                                                <input class="form-control" type="text" name="name_en" value="{{$product->name_en}}">
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        @error('name_ar')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <label>Product Name Ar</label>
                                                        <div class="position-relative">
                                                            <fieldset class="form-group">
                                                                <input class="form-control" type="text" name="name_ar" value="{{$product->name_ar}}">
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-body col-12"
                                                    style="display: flex; flex-direction: row; justify-content: space-between;">
                                                    <div class="col-sm-6">
                                                        @error('price')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <label>Product Price</label>
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <fieldset class="form-group">
                                                                    <input type="number" class="form-control"
                                                                        name="price" value="{{$product->price}}">
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        @error('quantity')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <label>Product Quantity</label>
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <fieldset class="form-group">
                                                                    <input type="number" class="form-control"
                                                                        name="quantity" value="{{$product->quantity}}" >
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                                <div class="modal-body col-12"
                                                    style="display: flex; flex-direction: row; justify-content: space-between;">
                                                    <div class="col-sm-7">
                                                        @error('image')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <label>Product Image</label>
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <fieldset class="form-group">
                                                                    <input type="file" class="form-control-file"
                                                                        name="image" id="exampleInputFile">
                                                                        <img src="{{ asset($product->image) }}" width="100px"
                                                                        height="100px">
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                                <div class="modal-body col-12"
                                                    style="display: flex; flex-direction: row; justify-content: space-between;">
                                                    <div class="col-sm-6">
                                                        @error('description_name_ar')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <label>Product Description Name Ar</label>
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <fieldset class="form-group">
                                                                    <textarea class="form-control"
                                                                        name="description_name_ar" >{{$product->description_name_ar}}</textarea>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        @error('description_name_en')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <label>Product Description Name En</label>
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <fieldset class="form-group">
                                                                    <textarea  class="form-control"
                                                                        name="description_name_en" >{{$product->description_name_en}}</textarea>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </fieldset>
                                            <div style="text-align: center;">
                                                <button type="submit" class="btn btn-primary">Update Product</button>
                                            </div>
                                            <form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
  
@endsection
