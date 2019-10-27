<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
        <div class="user">
            <div class="avatar-sm float-left mr-2">
                <img src="{{ asset('assets/back-end/') }}/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        {{ Auth::user()->name }}
                        <span class="user-level">{{ Auth::user()->role->type }}</span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#profile">
                                <span class="link-collapse">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                                <span class="link-collapse">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#settings">
                                <span class="link-collapse">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav nav-primary">
            <li class="nav-item active">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
            </li>

            <li class="nav-item">
                <a data-toggle="collapse" href="#category">
                    <i class="fas fa-database"></i>
                    <p>Category</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="category">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ route('add-category') }}">
                                <span class="sub-item">Create Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('manage-category') }}">
                                <span class="sub-item">Manage Category</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-toggle="collapse" href="#brand">
                    <i class="fas fa-layer-group"></i>
                    <p>Brand</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="brand">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ route('brands.create') }}">
                                <span class="sub-item">Add Brand</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('brands.index') }}">
                                <span class="sub-item">Manage Brand</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
           
            <li class="nav-item">
                <a data-toggle="collapse" href="#supplier">
                    <i class="far fa-chart-bar"></i>
                    <p>Supplier</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="supplier">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ route('suppliers.create') }}">
                                <span class="sub-item">Create Supplier</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('suppliers.index') }}">
                                <span class="sub-item">Manage Supplier</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-toggle="collapse" href="#product">
                    <i class="fas fa-database"></i>
                    <p>Product</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="product">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ route('products.create') }}">
                                <span class="sub-item">Create Product</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('products.index') }}">
                                <span class="sub-item">Manage Product</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="">
                    <i class="fas fa-desktop"></i>
                    <p>Widgets</p>
                </a>
            </li>
        </ul>
    </div>
</div>