@extends('back-end.master')
@section('title', 'Product: Show')
@section('main-content')
 <div class="container">
     <div class="row">
         <div class="col-md-10 offset-md-1">
             <a href="{{ route('products.index') }}" class="btn btn-info mb-3">
                 <i class="fas fa-backward"> Back</i>
             </a>
             <div class="card">
                 <div class="card-header text-center text-info" style="size:25px">
                     Product Details Information
                 </div>
                 <div class="card-body">
                     <table class="table table-hover">
                         <tr class=" bg-light text-success">
                             <th>Title</th>
                             <th>:</th>
                             <th>Description</th>
                         </tr>
                        <tr>
                            <th scope="row">SL</th>
                            <td>:</td>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Category Name</th>
                            <td>:</td>
                            <td>{{ $category->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Brand Name</th>
                            <td>:</td>
                            <td>{{ $brand->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Supplier Name</th>
                            <td>:</td>
                            <td>{{ $supplier->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Product Name</th>
                            <td>:</td>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Description</th>
                            <td>:</td>
                            <td>{!! $product->description !!}</td>
                        </tr>
                        <tr>
                            <th scope="row">Price</th>
                            <td>:</td>
                            <td>{!! $product->price !!}</td>
                        </tr>
                        <tr>
                            <th scope="row">Stock</th>
                            <td>:</td>
                            <td>{!! $product->stock !!}</td>
                        </tr>
                        <tr>
                            <th scope="row">Discount</th>
                            <td>:</td>
                            <td>{{ $product->discount }}%</td>
                        </tr>
                        <tr>
                            <th scope="row">Product Image</th>
                            <td>:</td>
                            <td>
                                <img src="{{ asset($product->image) }}" style="width:120px; height:100px;" alt="">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td>:</td>
                            <td>{{ $product->status==1 ? 'Published' : 'Unpublished' }}</td>
                        </tr>
                        
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection