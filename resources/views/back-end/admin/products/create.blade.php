@extends('back-end.master')
@section('title', 'Product: Create')
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <a href="{{ route('products.index') }}" class="btn btn-info mb-3">
                    <i class="fas fa-step-backward"></i> Back
                </a>
                <div class="card">
                    <div class="card-header text-center" style="color: blue; font-size: 20px">
                        Product Info
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Category Name</label>
                                <div class="col-md-10">
                                    <select name="category_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Brand Name</label>
                                <div class="col-md-10">
                                    <select name="brand_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Supplier Name</label>
                                <div class="col-md-10">
                                    <select name="supplier_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Name</label>
                                <div class="col-md-10">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name..." value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Description</label>
                                <div class="col-md-10">
                                <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Enter Description...">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Price</label>
                                <div class="col-md-10">
                                    <input type="number" name="price" class="form-control" placeholder="Enter Price..." value="{{ old('price') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Stock</label>
                                <div class="col-md-10">
                                    <input type="number" name="stock" class="form-control" placeholder="Enter Stock..." value="{{ old('stock') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Discount</label>
                                <div class="col-md-10">
                                    <input type="number" name="discount" class="form-control" placeholder="Enter Discount..." value="{{ old('discount') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Image</label>
                                <div class="col-md-10">
                                    <input type="file" name="image" class=" form-control-file">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Status</label>
                                <div class="col-md-10">
                                    <select name="status" class="form-control">
                                        <option value="" disabled>Select</option>
                                        <option value="1">Publish</option>
                                        <option value="0">Unpublish</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-10 offset-md-2">
                                    <input type="submit" class="btn btn-info" value="Add Product Info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
