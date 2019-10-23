@extends('back-end.master')
@section('title', 'Supplier: Edit')
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <a href="{{ route('suppliers.index') }}" class="btn btn-info mb-3">
                <i class="fas fa-step-backward"></i> Back
            </a>
            <div class="card">
                <div class="card-header text-center" style="color: blue; font-size: 20px">
                    Supplier Info
                </div>
                <div class="card-body">
                    <form action="{{ route('suppliers.update', ['supplier'=>$supplier->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control" placeholder="Enter Name..."
                                    value="{{ $supplier->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Company Name</label>
                            <div class="col-md-10">
                                <input type="text" name="company" class="form-control"
                                    placeholder="Enter Company Name..." value="{{ $supplier->company }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                                <input type="email" name="email" class="form-control" placeholder="Enter Email..."
                                    value="{{ $supplier->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Phone</label>
                            <div class="col-md-10">
                                <input type="number" name="phone" class="form-control" placeholder="Enter Phone..."
                                    value="{{ $supplier->phone }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Address</label>
                            <div class="col-md-10">
                                <textarea name="address" class="form-control" cols="30" rows="10"
                                    placeholder="Enter Adress...">{{ $supplier->address }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Status</label>
                            <div class="col-md-10">
                                <select name="status" class="form-control">
                                    <option value="" disabled>Select</option>
                                    <option value="1" {{ $supplier->status==1 ? 'selected' : ' ' }}>Publish</option>
                                    <option value="0" {{ $supplier->status==0 ? 'selected' : ' ' }}>Unpublish</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10 offset-md-2">
                                <input type="submit" class="btn btn-info" value="Update Supplier Info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection