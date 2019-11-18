@extends('back-end.master')

@section('title')
   Home: {{ Auth::user()->name }}
@endsection

@section('main-content')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border border-primary shadow h-70 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Category</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $categories->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border border-success shadow h-70 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Brand</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $brands->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border border-warning shadow h-70 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Supplier</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $suppliers->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border border-dark shadow h-70 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Total Product</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $products->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border border-primary shadow h-70 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Customer</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $customers->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border border-success shadow h-70 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Subscriber</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $subscribers->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border border-warning shadow h-70 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Order</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $orders->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border border-dark shadow h-70 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Total Review</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $reviews->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border border-primary shadow h-70 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">New customers today</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $todayCustomers->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border border-success shadow h-70 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">New Subscribers today</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $todaySubscribers->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border border-warning shadow h-70 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">New Orders <br> today</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $todayOrders->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border border-dark shadow h-70 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">New Reviews <br> today</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $todayReviews->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        
    </div>


   <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center text-info" style="font-size:20px">
                Top Rated Products
            </div>
            <div class="card-body">
                <div class=" table-responsive">
                    <table class="table table-hover">
                        <thead class=" thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Reviews</th>
                                <th>Created Date</th>
                                <th>Image</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($topRatedProducts as $key=>$product)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{!! Str::limit($product->description, 15) !!}</td>
                                <td>{{ $product->reviews->count() }}</td>
                                <td>{{ $product->created_at->toDateString() }}</td>
                                <td>
                                    <img src="{{ asset($product->image) }}" style="width:120px; height:100px" alt="{{ $product->name }}">
                                </td>

                                <td>
                                    <a href="{{ route('products.show', ['product'=>$product->id]) }}" class="badge badge-secondary" title="show">
                                        <i class="fas fa-eye"></i>
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

   <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center text-info" style="font-size:20px">
                Active Cusotmers List
            </div>
            <div class="card-body">
                <div class=" table-responsive">
                    <table class="table table-hover">
                        <thead class=" thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Reviews</th>
                                <th>Orders</th>
                                <th>Created Date</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($activeCustomers as $key=>$customer)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $customer->first_name.' '.$customer->last_name }}</td>
                                <td>{{ $customer->reviews->count() }}</td>
                                <td>{{ $customer->orders->count() }}</td>
                                <td>{{ $customer->created_at->toDateString() }}</td>

                                <td>
                                    <a href="#" class="badge badge-danger" title="delete"
                                        onclick="">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <form id="" action="" method="POST" style="display:none">
                                        @csrf
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

  
@endsection