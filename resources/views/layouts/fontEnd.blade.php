<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      @if($meta_status == 1 )
        <meta name="keywords" content="{{ $basic->meta_tag }}">
        <meta name="description" content="{{ $basic->title }}">
        <meta property="og:title" content="{{ $basic->title }}" />
        <meta property="og:url" content="{{ url('/') }}" />
        <meta property="og:image" content="{{ URL::asset('assets/images/logo.png') }}" />
        @else
            @yield('meta')
        @endif
        <title>{{ $site_title }} | {{ $page_title }}</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- LINEARICONS -->
      <link rel="stylesheet" href="{{ URL::asset('assets/fonts/linearicons/style.css') }}">

      <!-- IONICONS -->
      <link rel="stylesheet" href="{{ URL::asset('assets/css/ionicons.min.css') }}">

      <!-- MATERIAL DESIGN ICONIC FONT -->
      <link rel="stylesheet" href="{{ URL::asset('assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">

      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{ URL::asset('assets/fonts/font-awesome-5/css/fontawesome-all.min.css') }}">

       <!-- BOOTSTRAP -->
       <link rel="stylesheet" href="{{ URL::asset('assets/vendor/bootstrap/bootstrap.min.css') }}">

       <!-- owl-carousel -->
       <link rel="stylesheet" href="{{ URL::asset('assets/vendor/owl-carousel/css/owl.carousel.min.css') }}">
       <link rel="stylesheet" href="{{ URL::asset('assets/vendor/owl-carousel/css/owl.theme.default.min.css') }}">

       <!-- ANIMATE -->
       <link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css') }}">

       <!-- DATE-PICKER -->
      <link rel="stylesheet" href="{{ URL::asset('assets/vendor/date-picker/datepicker.min.css') }}">
      <!-- toastr CSS -->
      <link href="{{ URL::asset('assets/vendor/toastr/toastr.min.css') }}" rel="stylesheet">

       <!-- SLIDER REVOLUTION -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/vendor/revolution-slider/css/layers.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/vendor/revolution-slider/css/navigation.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/vendor/revolution-slider/css/settings.css') }}">

        <!-- SIDENAV MOBILE -->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/hcmobilenav/demo.css') }}">

        <!-- JQUERY TIME PICKER -->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/jquery-timepicker-master/jquery.timepicker.css') }}">

        <!-- NOUISLIDER -->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/nouislider/nouislider.min.css') }}">

      <!-- FAVICON -->
        <link rel="shortcut icon" href="{{ URL::asset('assets/favicon.png') }}">

       <!-- MY ACCOUNT CSS -->
       <link rel="stylesheet" href="{{ URL::asset('assets/css/my-account.css') }}">
       <!-- STYLE CSS -->
       <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
       @yield('style')
        <link rel="shortcut icon" href="{{ URL::asset('assets/favicon.png') }}">
   </head>

   <body>
        @include('layouts.header')

        <main>

            @yield('content')

        </main>
      
        <footer>
            <!-- FOOTER TOP -->
            <div class="ft-top">
                <div class="container">
                <div class="ft-top-wrapper">
                    <div class="ft-logo">
                        <a href="index.html">
                            <img src="{{ URL::asset('assets/images/logo.png') }}" alt="">
                        </a>
                    </div>
                    <div class="row justify-content-between justify-content-xl-start">
                        <div class="col-md-3  ft-col">
                            <h6>Sobre</h6>
                            <p>{!! $basic->footer_text !!}</p>
                        </div>
                        <div class="col-md-5  col-xl-4 offset-xl-1 ft-col">
                            <h6>Receba notícias e ofertas</h6>
                            <form method="post" action="{{ route('submit-subscribe') }}" id="form-subscribe">
                            {!! csrf_field() !!}
                                <div class="form-inner">
                                    <input type="email" name="email" id="formSubscribeEmail" placeholder="Digite seu email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                    <button type="submit">
                                        <span class="lnr lnr-envelope"></span>
                                    </button>
                                </div>
                            </form>
                            <div class="social">
                               
                                <li><a href="" class="facebook"></a></li>
                                
                                @foreach($socials as $sc)
                                <a href="{{ $sc->link }}">
                                    {!! $sc->code !!}
                                </a>
                                @endforeach
                                <!-- <a href="#">
                                    <i class="zmdi zmdi-facebook-box"></i>
                                </a>
                                <a href="#">
                                    <i class="zmdi zmdi-linkedin"></i>
                                </a>
                                <a href="#">
                                    <i class="zmdi zmdi-instagram"></i>
                                </a> -->
                            </div>
                        </div>
                        <div class="col-md-3 col-xl-2  ml-xl-auto ft-col">
                            <h6>Informações</h6>
                            <p>{{ $basic->address }}</p>
                            <p>{{ $basic->phone }}</p>
                            <p><a class="__cf_email__">{{ $basic->email }}</a></p>
                        </div>
                        <div class="col-md-12 col-xl-12 ml-xl-auto ft-col links-uteis">
                            <ul>
                            <li><a href="{{ route('terms-condition') }}">Termos e condições</a></li>
                            <li><a href="">Política de Troca</a></li>
                            <li><a href="{{ route('privacy-policy') }}">Política de Privacidade</a></li>
                            <li><a href="{{ route('about-us') }}">Sobre nós</a></li>
                            <li><a href="">Formas de Pagamento</a></li>
                            <li><a href="{{ route('contact-us') }}">Contato</a></li>
                            </ul>
                        </div>
                    </div>   
                </div>
                </div>
            </div>
            <div class="ft-bot">
                <div class="container">
                {!! $basic->copy_text !!}       
                </div>
            </div>
        </footer>

        <!-- CLICK TO TOP -->
        <div class="click-to-top">
            <span class="lnr lnr-arrow-up"></span>
        </div>
      
      <!-- jQUERY -->
      <script src="{{ URL::asset('assets/js/jquery-1.12.3.min.js') }}"></script>
       <!-- Toastr plugin -->
       <script src="{{ URL::asset('assets/vendor/toastr/toastr.min.js') }}"></script>
      <script data-cfasync="false" src="{{ URL::asset('assets/cloudflare_static/email_decode.min.js') }}"></script>

      <!-- BOOTSTRAP JS -->
      <script src="{{ URL::asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>

      <!-- Slider Revolution core JavaScript files -->
        <script src="{{ URL::asset('assets/vendor/revolution-slider/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/revolution-slider/js/jquery.themepunch.tools.min.js') }}"></script>

        <!-- Slider Revolution extension scripts. ONLY NEEDED FOR LOCAL TESTING -->
        <script src="{{ URL::asset('assets/vendor/revolution-slider/js/revolution.extension.actions.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/revolution-slider/js/revolution.extension.carousel.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/revolution-slider/js/revolution.extension.kenburn.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/revolution-slider/js/revolution.extension.layeranimation.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/revolution-slider/js/revolution.extension.migration.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/revolution-slider/js/revolution.extension.navigation.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/revolution-slider/js/revolution.extension.parallax.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/revolution-slider/js/revolution.extension.slideanims.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/revolution-slider/js/revolution.extension.video.min.js') }}"></script>

        <!-- MAP JS-->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEmXgQ65zpsjsEAfNPP9mBAz-5zjnIZBw"></script>
      <script src="{{ URL::asset('assets/js/theme-map.js') }}"></script>

      <!-- CAROUSEL JS -->
      <script src="{{ URL::asset('assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>
      <script src="{{ URL::asset('assets/vendor/owl-carousel/js/owl.carousel2.thumbs.min.js') }}"></script>

      <!-- SWEET ALERT -->
      <script src="{{ URL::asset('assets/js/sweetalert.min.js') }}"></script>

      <!-- SIDENAV MOBILE -->
      <script src="{{ URL::asset('assets/vendor/hcmobilenav/hc-mobile-nav.js') }}"></script>
      <!-- LIGHT GALLERY -->
      <script src="{{ URL::asset('assets/vendor/lightgallery/js/jquery.mousewheel.min.js') }}"></script>
      <script src="{{ URL::asset('assets/vendor/lightgallery/js/lightgallery-all.min.js') }}"></script>

      <!-- JQUERY UI -->
      <script src="{{ URL::asset('assets/vendor/jquery-ui/jquery-ui.min.js') }}"></script>
      <!-- noUISlider -->
      <script src="{{ URL::asset('assets/vendor/nouislider/nouislider.min.js') }}"></script>

      <!-- DATE-PICKER -->
      <script src="{{ URL::asset('assets/vendor/date-picker/datepicker.js') }}"></script>
      <script src="{{ URL::asset('assets/vendor/date-picker/datepicker.en.js') }}"></script>

      <script src="{{ URL::asset('assets/js/script-toastr.js') }}"></script>

      <!-- JQUERY TIMEPICKER -->
      <script src="{{ URL::asset('assets/vendor/jquery-timepicker-master/jquery.timepicker.min.js') }}"></script>

      <!-- noUISlider -->
      <script src="{{ URL::asset('assets/vendor/nouislider/nouislider.min.js') }}"></script>

      <!-- MAIN JS -->
      <script src="{{ URL::asset('assets/js/main.js') }}"></script>

      <!--<script type="text/javascript" src="{{ PagSeguro::getUrl()['javascript'] }}"></script>-->
      @yield('scripts')

      <script>

        $(document).ready(function () {
            $(document).on("click", '.delete_cart', function (e) {
                var rowId = $(this).data('id');
                $.post(
                        '{{ url('/delete-cart-item') }}',
                        {
                            _token: '{{ csrf_token() }}',
                            rowId : rowId
                        },
                        function(data) {
                            var result = $.parseJSON(data);
                            toastr.success('Produto deletado do carrinho.');
                            $('.cartShow').empty();
                            $('.cartShow').append(result['cartShow']);
                            $('#cartFullView').empty();
                            var div = document.getElementById('cartFullView');
                            div.innerHTML = result['fullShow'];
                        }

                );
            });
            $(document).on("click", '.SingleCartAdd', function (e) {
                var id = $(this).data('id');
                $.post(
                    '{{ url('/single-cart-add') }}',
                    {
                        _token: '{{ csrf_token() }}',
                        id : id
                    },
                    function(data) {
                        toastr.success('Produto Adicionado ao carrinho.');
                        $('#cartShow').empty();
                        $('#cartShow').append(data);
                    }
                );
            });
            $(document).on("click", '.SingleWishList', function (e) {
                var id = $(this).data('id');
                $.post(
                        '{{ url('/single-wishlist-add') }}',
                        {
                            _token: '{{ csrf_token() }}',
                            id : id
                        },
                        function(data) {
                            var result = $.parseJSON(data);
                            if (result['cartError'] == "yes"){
                                toastr.warning(result['cartErrorMessage']);
                            }else if(result['cartError'] == "exist"){
                                toastr.info(result['cartErrorMessage']);
                            }else {
                                toastr.success(result['cartErrorMessage']);
                            }
                        }
                );
            });
        });

    </script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
    
    {!! $basic->google_analytic !!}
    {!! $basic->chat !!}
   </body>
</html>


