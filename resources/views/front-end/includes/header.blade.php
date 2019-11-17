 <!--Header -->
    <header>
      <div class="container">

        <!-- Sidebar toggler -->
        <a class="nav-link nav-icon ml-ni nav-toggler mr-3 d-flex d-lg-none" href="#" data-toggle="modal" data-target="#menuModal"><i data-feather="menu"></i></a>

        <!-- Logo -->
        <a class="nav-link nav-logo" href="{{ route('/') }}"><strong>BdShop</strong></a>

        <!-- Main navigation -->
        <ul class="nav nav-main ml-auto d-none d-lg-flex"> <!-- hidden on md -->
          <li class="nav-item"><a class="nav-link {{ Route::currentRouteName()=='/' ? 'active' : '' }}" href="{{ route('/') }}">Home</a></li>
          <li class="nav-item dropdown dropdown-hover">
            <a class="nav-link dropdown-toggle forwardable {{ Request::is('categories') ? 'active' : '' }}" data-toggle="dropdown" href="categories" role="button" aria-haspopup="true" aria-expanded="false">
              Shop 
              <i data-feather="chevron-down"></i>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ route('category.allCategory') }}">Shop Categories</a>
              <a class="dropdown-item" href="{{ route('cart.index') }}">Cart</a>
              <a class="dropdown-item" href="{{ route('checkout.index') }}">Checkout</a>
            </div>
          </li>
          
          <li class="nav-item dropdown dropdown-hover">
            
            <a class="nav-link dropdown-toggle forwardable" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              Account <i data-feather="chevron-down"></i>
            </a>
            
            <div class="dropdown-menu">
              @if(!Session::has('customerId'))
              <a class="dropdown-item" href="{{ route('customer.loginForm') }}">Login</a>
              <a class="dropdown-item" href="{{ route('customer.registerForm') }}">Register</a>
              @endif
              @if(Session::has('customerId'))
              <a class="dropdown-item" href="{{ route('customer.profile') }}">Profile Page</a>
              <a class="dropdown-item" href="{{ route('customer.order') }}">Orders List</a>
              <a class="dropdown-item" href="{{ route('customer.wishlist') }}">Wishlist</a>
              <a class="dropdown-item" href="{{ route('customer.logout') }}">Logout</a>
              @endif
            </div>
          </li>

        <li class="nav-item"><a class="nav-link {{ Route::currentRouteName()=='pages.about-us' ? 'active' : '' }}" href="{{ route('pages.about-us') }}">About Us</a></li>

        <li class="nav-item"><a class="nav-link {{ Route::currentRouteName()=='pages.contact-us' ? 'active' : '' }}" href="{{ route('pages.contact-us') }}">Contact Us</a></li>
          
        </ul>
        <!-- /Main navigation -->

        <!-- Search form -->
        <form action="{{ route('search') }}" method="GET" class="form-inline form-search ml-auto mr-0 mr-sm-1 d-none d-sm-flex">
          
          <div class="input-group input-group-search">
            <div class="input-group-prepend">
              <button class="btn btn-light d-flex d-sm-none search-toggle" type="button"><i data-feather="chevron-left"></i></button>
            </div>
            <input name="query" type="text" class="form-control border-0 bg-light input-search" placeholder="Search...">
            <div class="input-group-append">
              <button class="btn btn-light" type="submit"><i data-feather="search"></i></button>
            </div>
          </div>
        </form>
        <!-- /Search form -->

       <!-- Cart -->
        <ul class="nav ml-auto ml-sm-0">
          
          @php
            $carts = Cart::getContent();
          @endphp
          <!-- Cart dropdown -->
          <li class="nav-item dropdown dropdown-hover dropdown-cart">
            <a class="nav-link nav-icon mr-nis dropdown-toggle forwardable ml-2" data-toggle="dropdown" href="cart" role="button" aria-haspopup="true" aria-expanded="false">
              <i data-feather="shopping-cart"></i>
              <span class="badge badge-primary">{{ $carts->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              
              
              @foreach($carts as $cart)
              <div class="media">
                <a href="{{ route('product-single', ['name'=>$cart->name,'id'=>$cart->id]) }}">
                  <img src="{{ asset($cart->attributes->image) }}" width="50" height="50" alt="{{ $cart->name }}">
                </a>

                <div class="media-body">
                  <a href="{{ route('product-single', ['name'=>$cart->name,'id'=>$cart->id]) }}" title="Product Details">{{ $cart->name }}</a>
                  <span class="qty">{{ $cart->quantity }}</span> x <span class="price">৳{{ $cart->price }}</span>

                  <a href="{{ route('cart.destroy', ['id'=>$cart->id]) }}">
                  <button type="button" class="close" aria-label="Close"><i data-feather="x-circle"></i></button>
                  </a>
                </div>

              </div>  
              @endforeach
              
              
              <div class="d-flex justify-content-between pb-3 pt-2">
                <span>Total</span>
                <strong>৳{{ Cart::getTotal () }}</strong>
              </div>

              <div class="d-flex justify-content-between pb-2">
                <div class="w-100 mr-1">
                  <a href="{{ route('cart.index') }}" class="btn btn-block rounded-pill btn-secondary">View Cart</a>
                </div>
                <div class="w-100 ml-1">
                  <a href="{{ route('checkout.index') }}" class="btn btn-block rounded-pill btn-primary">Checkout</a>
                </div>
              </div>
            </div>
          </li>
          <!-- /Cart dropdown -->
        </ul>

       <!-- Cart -->

      </div><!-- /.container -->
    </header>
    <!-- /Header -->