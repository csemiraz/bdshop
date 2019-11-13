@extends('front-end.master')
@section('title', 'BdShop: Contact Us')
@section('main-content')
	<div class="container my-3">
      <div class="card">
        <div class="card-body">
          <div class="row">

            <!-- Map -->
            <div class="col-md-6">
              <div class="img-thumbnail">
                <div class="embed-responsive embed-map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14605.205906102312!2d90.3551191194182!3d23.772276540460386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0a880f7909d%3A0xe8d7d2484b62becc!2sShyamoli%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1573625476219!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
              </div>
            </div>


            <!-- Contact Us Form -->
            <div class="col-md-6 mt-3 mt-md-0">
              <h3 class="bold">Contact Us</h3>

              <form action="{{ route('contact.store') }}" method="POST" class="mt-3 form-style-1">
                @csrf

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <div class="media">
                      <span><i class="fa fa-map-marker fa-fw text-info"></i></span>
                      <div class="media-body ml-1">
                        <div>West Agargoan</div>
                        <div>Dhaka</div>
                        <div>BD, 1207</div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="media mb-3 mb-md-0">
                      <span><i class="fa fa-phone fa-fw text-info"></i></span>
                      <div class="media-body ml-1">+8801972493231</div>
                    </div>
                    <div class="media">
                      <span><i class="fa fa-envelope fa-fw text-info"></i></span>
                      <div class="media-body ml-1">support@bdshop.com</div>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <span class="input-icon">
                    <i data-feather="user"></i>
                    <input name="name" type="text" class="form-control" placeholder="Your Name">
                  </span>
                </div>

                <div class="form-group">
                  <span class="input-icon">
                    <i data-feather="mail"></i>
                    <input name="email" type="email" class="form-control" placeholder="Email">
                  </span>
                </div>

                <div class="form-group">
                  <span class="input-icon">
                    <i data-feather="message-square"></i>
                    <textarea name="message" class="form-control" rows="3" placeholder="Message"></textarea>
                  </span>
                </div>

                <button type="submit" class="btn btn-primary">Send</button>
              </form>

            </div>
            <!-- /Contact Us Form -->

          </div>
        </div>
      </div>
    </div>
@endsection