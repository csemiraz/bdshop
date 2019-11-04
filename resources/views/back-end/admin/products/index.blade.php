@extends('back-end.master')

@section('title', 'Product: Manage-Product')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('products.create') }}" class="btn btn-info mb-3">
                    <i class="fas fa-plus"> Create</i>
                </a>
                <div class="card">
                    <div class="card-header text-center text-info" style="font-size:20px">
                        Manage Product
                    </div>
                    <div class="card-body">
                        <div class=" table-responsive">
                            <table class="table table-hover">
                                <thead class=" thead-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Category Name</th>
                                        <th>Brand Name</th>
                                        <th>Supplier Name</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Discount</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($products as $key=>$product)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $product->categoryName }}</td>
                                        <td>{{ $product->brandName }}</td>
                                        <td>{{ $product->supplierName }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{!! Str::limit($product->description, 15) !!}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->discount }}</td>
                                        <td>
                                            <img src="{{ asset($product->image) }}" style="width:120px; height:100px" alt="{{ $product->name }}">
                                        </td>
                                        <td>
                                            @if($product->status==1)
                                            <span class="badge badge-success">Published</span>
                                            @else
                                            <span class="badge badge-warning">Unpublished</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('products.show', ['product'=>$product->id]) }}" class="badge badge-secondary" title="show">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                          
                                            <a href="{{ route('products.edit', ['product'=>$product->id]) }}" class="badge badge-info" title="edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="badge badge-danger" title="delete"
                                                onclick="deleteData({{ $product->id }})">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <form id="delete-data-{{ $product->id }}" action="{{ route('products.destroy', ['product'=>$product->id]) }}" method="POST" style="display:none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection