@extends('back-end.master')
@section('title')
Category: Manage-Category
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class=" card">
                <div class="card-header text-center">
                    Manage Category
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>SL</td>
                                <td>Name</td>
                                <td>Description</td>
                                <td>Image</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection