<div class="swiper-container" id="home-slider">
    <div class="swiper-wrapper">

        @foreach($sliders as $slider)
        <div class="swiper-slide" data-cover="{{ asset($slider->image) }}" data-xs-height="220px"
            data-sm-height="350px" data-md-height="400px" data-lg-height="430px" data-xl-height="460px">
            <div class="swiper-overlay right">
                <div class="text-center text-light">  
                  <h1>{{ $slider->title }}</h1>
                  <p>{!! $slider->description !!}</p>
                  @if($slider->link!=null)
                  <a href="{{ route($slider->link) }}" class="btn btn-primary rounded-pill animated" data-animate="fadeUp" data-addclass-on-xs="btn-sm">SHOP NOW</a>
                  @endif
                </div>
            </div>
        </div>
       @endforeach

    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev autohide"><i data-feather="chevron-left"></i></div>
    <div class="swiper-button-next autohide"><i data-feather="chevron-right"></i></div>
</div>