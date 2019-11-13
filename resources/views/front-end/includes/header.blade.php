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
            <a class="nav-link dropdown-toggle forwardable" data-toggle="dropdown" href="shop-categories.html" role="button" aria-haspopup="true" aria-expanded="false">
              Shop <i data-feather="chevron-down"></i>
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
              <a class="dropdown-item" href="{{ route('customer.loginForm') }}">Login</a>
              <a class="dropdown-item" href="{{ route('customer.registerForm') }}">Register</a>
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
        <form class="form-inline form-search ml-auto mr-0 mr-sm-1 d-none d-sm-flex">
          <div class="input-group input-group-search">
            <div class="input-group-prepend">
              <button class="btn btn-light d-flex d-sm-none search-toggle" type="button"><i data-feather="chevron-left"></i></button>
            </div>
            <input type="text" class="form-control border-0 bg-light input-search" placeholder="Search...">
            <div class="input-group-append">
              <button class="btn btn-light" type="submit"><i data-feather="search"></i></button>
            </div>
          </div>
        </form>
        <!-- /Search form -->

        <!-- Cart -->
        <ul class="nav ml-auto ml-sm-0">
          <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}"><i data-feather="shopping-cart"></i> Cart</a></li>
        </ul>
        <!-- Cart -->

      </div><!-- /.container -->
    </header>
    <!-- /Header -->