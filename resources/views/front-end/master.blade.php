<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- FONTS  -->
    <!-- <link rel="stylesheet" href="../fonts/nunito.css"> -->
    <!-- <link rel="stylesheet" href="../fonts/roboto.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700">

    <!-- REQUIRED CSS: BOOTSTRAP, METISMENU, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="{{ asset('assets/front-end/') }}/dist/css/vendor.min.css">


    <!-- PLUGINS FOR CURRENT PAGE -->
    <link rel="stylesheet" href="{{ asset('assets/front-end/') }}/plugins/swiper/swiper.min.css">
    <link rel="stylesheet" href="{{ asset('assets/front-end/') }}/plugins/noty/noty.min.css">

    <!-- PLUGINS FOR CURRENT PAGE -->
    <link rel="stylesheet" href="{{ asset('assets/front-end/') }}/plugins/photoswipe/photoswipe.min.css">
    <link rel="stylesheet" href="{{ asset('assets/front-end/') }}/plugins/photoswipe/photoswipe-default-skin/default-skin.min.css">

    <link rel="stylesheet" href="{{ asset('assets/front-end/') }}/plugins/nouislider/nouislider.min.css">

    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="{{ asset('assets/front-end/') }}/dist/css/style.min.css">

    {{-- Toastr Notication --}}
    <link rel="stylesheet" href="{{ asset('assets/toastr/toastr.min.css') }}">

    <title>@yield('title')</title>
</head>

<body>

    <!-- Top bar -->
    @include('front-end.includes.topbar')
    <!-- /Top bar -->


    <!--Header -->
    @include('front-end.includes.header')
    <!-- /Header -->

    <!-- Main Content -->
    @yield('main-content')
    <!-- /Main Content -->

    <!-- Footer -->
    @include('front-end.includes.footer')
    <!-- /Footer -->

    <!--Menu Modal -->
    <div class="modal modal-left modal-menu" id="menuModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header shadow">
                    <a class="h5 mb-0 d-flex align-items-center" href="{{ route('/') }}">
                        <img src="{{ asset('assets/front-end/') }}/img/logo.svg" alt="BdShop" class="mr-3">
                        <strong>BdShop</strong>
                    </a>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body shadow">
                    <ul class="menu" id="menu">
                        <li class="no-sub mm-active"><a href="{{ route('/') }}"><i data-feather="home"></i> Home</a></li>
                        <li>
                            <a href="#" class="has-arrow"><i data-feather="shopping-bag"></i> Shop</a>
                            <ul>
                                <li><a href="{{ route('category.allCategory') }}">Shop Categories</a></li>
                                <li><a href="{{ route('cart.index') }}">Cart</a></li>
                                <li><a href="{{ route('checkout.index') }}">Checkout</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="has-arrow"><i data-feather="user"></i> Account</a>
                            <ul>
                                <li><a href="{{ route('customer.loginForm') }}">Login</a></li>
                                <li><a href="{{ route('customer.registerForm') }}">Register</a></li>

                                @if(Session::has('customerId'))
                                <li><a href="{{ route('customer.profile') }}">Profile</a></li>
                                <li><a href="{{ route('customer.order') }}">Order List</a></li>
                                <li><a href="{{ route('customer.wishlist') }}">Wish List</a></li>
                                <li><a href="{{ route('customer.logout') }}">Logout</a></li>
                                @endif
                                
                            </ul>
                        </li>

                        <li class="no-sub"><a href="{{ route('pages.about-us') }}"><i data-feather="file"></i> About Us</a></li>

                        <li class="no-sub"><a href="{{ route('pages.contact-us') }}"><i data-feather="file"></i> Contact Us</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Menu Modal -->

    <!-- REQUIRED JS  -->
    <script src="{{ asset('assets/front-end/') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets/front-end/') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/front-end/') }}/plugins/feather-icons/feather.min.js"></script>
    <script src="{{ asset('assets/front-end/') }}/plugins/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('assets/front-end/') }}/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <!-- PLUGINS FOR CURRENT PAGE -->
    <script src="{{ asset('assets/front-end/') }}/plugins/swiper/swiper.min.js"></script>
    <script src="{{ asset('assets/front-end/') }}/plugins/noty/noty.min.js"></script>
    <script src="{{ asset('assets/front-end/') }}/plugins/jquery-countdown/jquery.countdown.min.js"></script>

    <script src="{{ asset('assets/front-end/') }}/plugins/nouislider/nouislider.min.js"></script>

    <!-- PLUGINS FOR Sinlgle Product PAGE -->
    <script src="{{ asset('assets/front-end/') }}/plugins/photoswipe/photoswipe.min.js"></script>
    <script src="{{ asset('assets/front-end/') }}/plugins/photoswipe/photoswipe-ui-default.min.js"></script>
 

    <!-- Mimity JS  -->
    <script src="{{ asset('assets/front-end/') }}/dist/js/script.min.js"></script>

    {{-- Toastr Notification --}}
      <script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
      {!! Toastr::message() !!}
      
      <script>
        @if($errors->any())
      			@foreach($errors->all() as $error)
      				toastr.error('{{ $error }}', 'Error', {
      					"closeButton": true,
      					"debug": false,
      					"newestOnTop": false,
      					"progressBar": true,
      					"positionClass": "toast-top-right",
      					"preventDuplicates": false,
      					"onclick": null,
      					"showDuration": "300",
      					"hideDuration": "1000",
      					"timeOut": "5000",
      					"extendedTimeOut": "1000",
      					"showEasing": "swing",
      					"hideEasing": "linear",
      					"showMethod": "fadeIn",
      					"hideMethod": "fadeOut"
      				})
      			@endforeach
      		@endif
      </script>

    <script>
        $(function () {

      App.atcDemo() // Add to Cart Demo
      App.atwDemo() // Add to Wishlist Demo
      App.homeSlider('#home-slider')
      App.dealsSlider('#deals-slider')
      App.colorOption()

      // example countdown, 6 hours from now for flash deals
      var countdown = new Date()
      countdown.setHours(countdown.getHours() + 6)
      $('#flash-deals-countdown').countdown(countdown, function (event) {
        $(this).text(event.strftime('%H:%M:%S'))
      })

    })
    </script>

    <script>
            $(function () {

              setTimeout(function (argument) {
                var productSlider = new Swiper('#product-slider', {
                  loop: true,
                  pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                  },
                  navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                  }
                })
              }, 100)
        
              // Collect items for photoswipe
              var items = []
              $('.swiper-wrapper img').each(function () {
                items.push({
                  src: $(this).data('large'),
                  w: 1395,
                  h: 1500
                })
              })
        
              var openPhotoSwipe = function (items, activeIndex) {
                activeIndex = typeof activeIndex !== 'undefined' ? activeIndex : 0
                var pswpElement = document.querySelectorAll('.pswp')[0]
                var options = {
                  index: activeIndex
                }
                var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options)
                gallery.init()
              }
        
              $('.zoom').click(function () {
                openPhotoSwipe(items, $('.swiper-wrapper').find('.swiper-slide-active').data('swiper-slide-index'))
              })
        
            })
        </script>

        <script>
            $(function () {
          
                App.rating()
                App.quickviewDemo()
          
                var filter = {
                  categories: function () {
                    $('.list-tree').metisMenu()
                  },
                  price: function () {
                    var priceSlider = document.getElementById('price-slider')
                    noUiSlider.create(priceSlider, {
                      start: [25, 75],
                      connect: true,
                      range: {
                        'min': 0,
                        'max': 100
                      }
                    })
                    var prefix = '$'
                    var priceSliderValues = [
                      document.getElementById('price-slider-min'),
                      document.getElementById('price-slider-max')
                    ]
                    priceSlider.noUiSlider.on('update', function (values, handle) {
                      priceSliderValues[handle].value = prefix + values[handle]
                    })
                    priceSliderValues[0].addEventListener('change', function () {
                      priceSlider.noUiSlider.set([this.value.replace(prefix, ''), null])
                    })
                    priceSliderValues[1].addEventListener('change', function () {
                      priceSlider.noUiSlider.set([null, this.value.replace(prefix, '')])
                    })
                  },
                  brands: function () {
                    var psBrands = new PerfectScrollbar('.brands-list', { wheelPropagation: false })
                    $('#search-brands').on('keyup', function () {
                      var value = $(this).val().toLowerCase()
                      $('.brands-list .custom-control').filter(function () {
                        $(this).toggle($(this).find('label').contents().not($(this).find('label').children()).text().toLowerCase().indexOf(value) > -1)
                      })
                      psBrands.update()
                    })
                  }
                }
          
                setTimeout(function () {
                  filter.price()
                  filter.brands()
                  filter.categories()
          
                  // quickview
                  var quickviewSlider = new Swiper('#quickview-slider', {
                    loop: true,
                    pagination: {
                      el: '.swiper-pagination',
                      clickable: true
                    },
                    navigation: {
                      nextEl: '.swiper-button-next',
                      prevEl: '.swiper-button-prev',
                    }
                  })
                  $('#quickviewModal').on('shown.bs.modal', function () {
                    quickviewSlider.update()
                  })
                }, 100)
          
                var sidebarContent = $('.accordion-sidebar').html()
                $('#filterModal').on('show.bs.modal', function () {
                  // move filter contents to modal body
                  $(this).find('.modal-body').html('<div class="accordion accordion-caret accordion-sidebar accordion-modal">'+sidebarContent+'</div>')
                  // empty the sidebar filter contents
                  $('.accordion-sidebar:not(.accordion-modal)').html('')
                  // run filters
                  filter.categories()
                  filter.price()
                })
                $('#filterModal').on('shown.bs.modal', function () {
                  // PerfectScrollbar need to wait until all content appears to work, so we use 'shown.bs.modal' event
                  filter.brands()
                })
                $('#filterModal').on('hidden.bs.modal', function () {
                  $('.accordion-modal').remove() // remove modal filter contents
                  $('.accordion-sidebar').html(sidebarContent) // move filter contents back to the sidebar
                  // run filters
                  filter.categories()
                  filter.price()
                  filter.brands()
                })
          
              })
          </script>

</body>

</html>