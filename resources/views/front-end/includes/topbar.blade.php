<div class="topbar">
    <div class="container d-flex">

        <!-- service contact -->
        <nav class="nav d-none d-md-flex">
            <!-- hidden on xs -->
            <a class="nav-link pl-0" href="javascript:void(0)"><i data-feather="phone"></i> 01972493231</a>
            <a class="nav-link" href="javascript:void(0)"><i data-feather="mail"></i> support@bdshop.com</a>
        </nav>

        <!-- social media -->
        <nav class="nav">
            <a class="nav-link pr-2 pl-0" href="javascript:void(0)"><i data-feather="facebook"></i></a>
            <a class="nav-link px-2" href="javascript:void(0)"><i data-feather="twitter"></i></a>
            <a class="nav-link px-2" href="javascript:void(0)"><i data-feather="instagram"></i></a>
        </nav>

        <!-- language -->
        <nav class="nav nav-lang ml-auto">
            <!-- push it to the right -->
            <a class="nav-link active" href="javascript:void(0)">EN</a>
            <a class="nav-link pipe">|</a>
            <a class="nav-link" href="javascript:void(0)">RU</a>
        </nav>

        @if(Session::get('customerId'))
        <!-- User dropdown -->
        <ul class="nav">
            <li class="nav-item dropdown dropdown-hover">
                <a class="nav-link dropdown-toggle pr-0" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="true" aria-expanded="false">
                    <i data-feather="user"></i> Hi, {{ Session::get('customerFirstName') }}<i data-feather="chevron-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="media p-1 align-items-center mb-2">
                        <img src="{{ asset('assets/front-end/') }}/img/user/user.svg" alt="user"
                            class="img-thumbnail rounded-circle mr-2 size50x50">
                        <div class="media-body">
                            <strong>{{ Session::get('customerFirstName').' '.Session::get('customerLastName') }}</strong>
                            <div class="small counter"></div>
                        </div>
                    </div>
                    <a href="{{ route('customer.order') }}" class="dropdown-item has-icon"><i data-feather="shopping-cart"></i>My
                        Orders</a>
                    <a href="{{ route('customer.wishlist') }}" class="dropdown-item has-icon has-badge"><i
                            data-feather="heart"></i>Wishlist</a>
                    <a href="{{ route('customer.profile') }}" class="dropdown-item has-icon"><i data-feather="settings"></i>Account
                        Setting</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{  route('customer.logout') }}" class="dropdown-item has-icon text-danger"><i
                            data-feather="log-out"></i>Logout</a>
                </div>
            </li>
        </ul>
        <!-- /User dropdown -->
        @else
        <!-- Login/Registration -->
        <nav class="nav nav-lang ml-auto">
            <!-- push it to the right -->
            <a class="nav-link" href="{{ route('customer.registerForm') }}">Registration</a>
            <a class="nav-link pipe">|</a>
            <a class="nav-link" href="{{ route('customer.loginForm') }}">Login</a>
        </nav>
        @endif

    </div><!-- /.container -->
</div>