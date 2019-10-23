@extends('back-end.master')

@section('title', 'Supplier: Manage-Supplier')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('suppliers.create') }}" class="btn btn-info mb-3">
                    <i class="fas fa-plus"> Create</i>
                </a>
                <div class="card">
                    <div class="card-header text-center text-info" style="font-size:20px">
                        Manage Supplier
                    </div>
                    <div class="card-body">
                        <div class=" table-responsive-md">
                            <table class="table table-hover">
                                <thead class=" thead-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Company Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($suppliers as $key=>$supplier)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $supplier->name }}</td>
                                        <td>{{ $supplier->company }}</td>
                                        <td>{!! $supplier->address !!}</td>
                                        <td>{{ $supplier->phone }}</td>
                                        <td>{{ $supplier->email }}</td>
                                        <td>
                                            @if($supplier->status==1)
                                            <span class="badge badge-success">Published</span>
                                            @else
                                            <span class="badge badge-warning">Unpublished</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- <a href="" class="badge badge-secondary" title="show">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if($supplier->status=1)
                                            <a href="" class="badge badge-warning" title="unpublish">
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                            @else
                                            <a href="" class="badge badge-success" title="publish">
                                                <i class="fas fa-arrow-up"></i>
                                            </a>
                                            @endif --}}
                                            <a href="{{ route('suppliers.edit', ['supplier'=>$supplier->id]) }}" class="badge badge-info" title="edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="badge badge-danger" title="delete"
                                                onclick="deleteData({{ $supplier->id }})">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <form id="delete-data-{{ $supplier->id }}" action="{{ route('suppliers.destroy', ['supplier'=>$supplier->id]) }}" method="POST" style="display:none">
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