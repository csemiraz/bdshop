<div class="footer">
    <div class="container">
        <div class="row no-gutters">

            <div class="col-sm-6 col-lg-3 text-center px-3">
                <h5 class="bold">SUBSCRIBE</h5>
                <p>and get <strong class="text-primary">10% discount</strong></p>
                <form action="{{ route('subscriber.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input name="email" type="email" required class="form-control rounded-pill text-center"
                            placeholder="Enter your email">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block rounded-pill">SUBSCRIBE</button>
                </form>
            </div>

            <div class="col-6 col-lg-3">
                <h6 class="bold">Customer Service</h6>
                <div class="list-group list-group-flush list-group-no-border list-group-sm">
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">Help Center</a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">How to buy</a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">Delivery</a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">How to return</a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">Payment Method</a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">Shipping Method</a>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <h6 class="bold">BdShop</h6>
                <div class="list-group list-group-flush list-group-no-border list-group-sm">
                    <a href="{{ route('pages.about-us') }}" class="list-group-item list-group-item-action">About Us</a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">Terms and
                        Conditions</a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">Privacy Policy</a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">FAQs</a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">Our Story</a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">Services</a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <h6 class="bold">Download The App</h6>
                <a href="javascript:void(0)" class="download-app">
                    <div class="media">
                        <img src="{{ asset('assets/front-end/') }}/img/app/google-play.svg" alt="Google Play Logo"
                            height="30">
                        <div class="media-body">
                            <small>Get it on</small>
                            <h5>Google Play</h5>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="download-app">
                    <div class="media">
                        <img src="{{ asset('assets/front-end/') }}/img/app/apple.svg" alt="Apple Logo" height="30">
                        <div class="media-body">
                            <small>Download on the</small>
                            <h5>App Store</h5>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="download-app">
                    <div class="media">
                        <img src="{{ asset('assets/front-end/') }}/img/app/windows.svg" alt="Windows Logo" height="30">
                        <div class="media-body">
                            <small>Get it from</small>
                            <h5>Microsoft Store</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="copyright">Copyright © {{ date('Y') }} BdShop All right reserved</div>