@extends('front-end.master')
@section('title', 'BdShop: About Us')
@section('main-content')
	<div class="container my-3">
      <div class="card">
        <div class="card-body">

          <!-- About Us -->
          <div class="row">
            <div class="col-md-6 mb-3 mb-md-0">
              <img src="{{ asset('assets/front-end/') }}/img/about-us/about-us.jpg" alt="About Us" class="w-100">
            </div>
            <div class="col-md-6">
              <h2 class="bold">About Us</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate explicabo saepe inventore quisquam adipisci maxime vitae hic, magni error praesentium eaque laborum pariatur omnis illo, voluptatem, nam dicta sunt dolore!</p>
              <p>Quod quam est illo provident animi amet a reprehenderit quidem quo voluptates! Voluptatibus quas blanditiis molestiae placeat eligendi maxime itaque, ipsum, reiciendis!</p>
            </div>
          </div>
          <!-- /About Us -->

          <hr class="my-5">

          <!-- Our Purpose -->
          <div class="row">
            <div class="col-md-6 mb-3 mb-md-0 order-md-2">
              <img src="{{ asset('assets/front-end/') }}/img/about-us/our-purpose.jpg" alt="Our Purpose" class="w-100">
            </div>
            <div class="col-md-6 order-md-1">
              <h2 class="bold">Our Purpose</h2>
              <p>Quod quam est illo provident animi amet a reprehenderit quidem quo voluptates! Voluptatibus quas blanditiis molestiae placeat eligendi maxime itaque, ipsum, reiciendis!</p>
              <ul>
                <li>Lorem ipsum dolor sit amet</li>
                <li>Consectetur adipiscing elit</li>
                <li>Integer molestie lorem at massa</li>
                <li>Facilisis in pretium nisl aliquet</li>
                <li>Nulla volutpat aliquam velit</li>
              </ul>
            </div>
          </div>
          <!-- /Our Purpose -->

          <hr class="my-5">

          <!-- Our Values -->
          <h2 class="bold text-center mb-4">Our Values</h2>
          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="media">
                <img class="rounded-circle mr-3" src="{{ asset('assets/front-end/') }}/img/about-us/serve.jpg" width="64" height="64" alt="We Serve">
                <div class="media-body">
                  <h5 class="bold">We Serve</h5>
                  Our customers are the sole arbiter of the value of our products and services. We strive to meet unmet needs and serve the underserved.
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="media">
                <img class="rounded-circle mr-3" src="{{ asset('assets/front-end/') }}/img/about-us/run.jpg" width="64" height="64" alt="We Run">
                <div class="media-body">
                  <h5 class="bold">We Run</h5>
                  We are in a constant race to success while grappling with rapidly shifting forces. We move faster, better and with more urgency every day.
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="media">
                <img class="rounded-circle mr-3" src="{{ asset('assets/front-end/') }}/img/about-us/adapt.jpg" width="64" height="64" alt="We Adapt">
                <div class="media-body">
                  <h5 class="bold">We Adapt</h5>
                  Rapid change is the only constant in the digital age of ours. We embrace change, celebrate it and always strive to be a thought leader that influences it.
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="media">
                <img class="rounded-circle mr-3" src="{{ asset('assets/front-end/') }}/img/about-us/commit.jpg" width="64" height="64" alt="We Commit">
                <div class="media-body">
                  <h5 class="bold">We Commit</h5>
                  Our work is our commitment. We commit to our values, institution, customers and partners. We commit to each other. Above all, we commit to doing the best we can and being the best we are.
                </div>
              </div>
            </div>
          </div>
          <!-- /Our Values -->

        </div>
      </div>
    </div>
@endsection