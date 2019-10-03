@extends('layouts.fontEnd')
@section('style')

@endsection
@section('content')

    <!-- SLIDE SHOW -->
    <div class="rev_slider_wrapper">
        <div id="rev_slider_1" class="rev_slider" data-version="5.4.5">
            <ul> 
                <li data-transition="">
                    <img src="{{ asset('assets/images/slideshow-1.jpeg') }}" class="rev-slidebg" alt="">

                    <div class="tp-caption tp-resizeme caption-1" data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"y:-20px;opacity:0;","ease":"Power3.easeInOut"}]' data-x="center" data-y="middle" data-fontsize="['72', '70', '65', '60', '60']" data-voffset="['-43.5','-57', '-54', '-97', '-100']" data-textalign="center" data-lineheight="inherit" data-color="#cdaa7c">
                O beef mais suculento
                </div>
    
                <div class="tp-caption tp-resizeme caption-2" data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"y:-20px;opacity:0;","ease":"Power3.easeInOut"}]' data-x="center" data-y="middle" data-voffset="['47.5', '34', '37', '-6', '-9']" data-fontsize="['20', '20', '20', '20', '25']" data-lineheight="inherit" data-color="#ccc">
                você só encontar aqui
                </div>

                    <div class="rs-background-video-layer" data-forcerewind="on" data-volume="mute" data-videowidth="100%" data-videoheight="100%" data-ytid="9uByR0HAVAc" data-videoattributes="version=3&enablejsapi=1&html5=1&hd=1&wmode=opaque&showinfo=0&rel=0&
                origin=http://www.youtube.com/" data-videopreload="auto" data-videorate="1" data-forcecover="1" data-videoloop="loopandnoslidestop" data-aspectratio="16:9" data-videostartat="00:00" data-autoplay="on" data-autoplayonlyfirsttime="true">  
                </div>

                </li>
            </ul>
        </div>
    </div>

    <!-- WELCOME TO ROYATE -->
    <section class="welcome section-primary">
    <div class="container">
        <div class="section-header text-left">
            <span>~ Produtos em destaque ~</span>
        </div>
        <div class="row text-center">
            <div class="col-md-2">
                <!-- BANNER -->
                <div class="widgets widget_banner">
                    <div class="row mb-3">
                        <a href="#">
                            <img src="{{ asset('assets/images/widget-banner.jpeg') }}" alt="">
                        </a>
                    </div>
                    <div class="row">
                        <a href="#">
                            <img src="{{ asset('assets/images/masonry-7.jpeg') }}" alt="">
                        </a>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-10 float-left">

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        @foreach($featuredProduct->chunk(8) as $fPro)
                            @foreach($fPro as $fp)
                            <div class="col-md-3 float-left mb-3">
                                <div class="item {{ $fp->stock == 0 ? 'sold-out' : ''}}">
                                    <div class="feature-small">
                                    <a href="{{ route('product-details',$fp->slug) }}">
                                        <img src="{{ asset('assets/images/products') }}/{{ $fp->image }}" width="140" height="140" alt="{{ $fp->name }}">
                                    </a>
                                    <div class="item-info">
                                        <h6>
                                            <a href="{{ route('product-details',$fp->slug) }}" title="{{ $fp->name }}">{{ substr($fp->name,0,30) }}</a>
                                        </h6>
                                        <span class="price">
                                            {{$basic->symbol}}{{ $fp->current_price }}
                                            @if($fp->old_price != null)
                                                <del class="price old-price">{{$basic->symbol}}{{ $fp->old_price }}</del>
                                            @endif
                                        </span>
                                        <div class="add-cart">
                                            <button data-id="{{ $fp->id }}" class="btn btn-default SingleCartAdd"><i class="zmdi zmdi-shopping-cart-plus"></i>Adicionar</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endforeach
                    </div>
                    
                </div>

            </div>
        </div>         
    </div>
    </section>
    
    <!-- OUR MENU -->
    <section class="our-menu section-primary pb-113">
    <div class="container">
        <div class="section-header">
            <h2 class="text-white">Novos</h2>
        </div>         
        <div class="row justify-content-between">
            <div class="col-md-12">
                <div class="our-menu-col left">
                    <!-- OWL-CAROUSEL -->
                    <div class="feature-slider">
                    @foreach($latestProduct->chunk(20) as $fPro)
                        <div class="owl-carousel owl-theme style" id="feature-carousel">
                        @foreach($fPro as $fp)
                            <div class="item {{ $fp->stock == 0 ? 'sold-out' : ''}}">
                                <div class="feature-small">
                                <a href="{{ route('product-details',$fp->slug) }}">
                                    <img src="{{ asset('assets/images/products') }}/{{ $fp->image }}" width="140" height="140" alt="{{ $fp->name }}">
                                </a>
                                <div class="item-info">
                                    <h6>
                                        <a href="{{ route('product-details',$fp->slug) }}" title="{{ $fp->name }}">{{ substr($fp->name,0,30) }}</a>
                                    </h6>
                                    <span class="price">
                                        {{$basic->symbol}}{{ $fp->current_price }}
                                        @if($fp->old_price != null)
                                            <del class="price old-price">{{$basic->symbol}}{{ $fp->old_price }}</del>
                                        @endif
                                    </span>
                                    <div class="add-cart">
                                        <button data-id="{{ $fp->id }}" class="btn btn-default SingleCartAdd"><i class="zmdi zmdi-shopping-cart-plus"></i>Adicionar</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        <!-- NAVIGATION BUTTON -->
                        <span class="lnr lnr-chevron-left" id="feature-prev"></span>
                        <span class="lnr lnr-chevron-right" id="feature-next"></span>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- FEATURE -->
    <section class="section-primary pt-150 pb-120 feature">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('assets/images/feature.jpeg') }}" alt="">
            </div>
            <div class="col-md-6">
                <div class="feature-content">
                <div class="heading">
                    <h3>
                        <a href="shop-single.html">Beef steak with green</a>
                    </h3>
                    <span class="price">
                        <span>$</span>45
                    </span>
                </div>
                <div class="body">
                    <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure</p>
                    <div class="star-rating">
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                    </div>
                    <!-- OWL-CAROUSEL -->
                    <div class="feature-slider">
                        <div class="owl-carousel owl-theme style" id="feature-carousel">
                            <div class="item">
                            <div class="feature-small">
                                <a href="shop-single.html">
                                    <img src="{{ asset('assets/images/feature-small-1.png') }}" alt="">
                                </a>
                                <div class="item-info">
                                    <h6>
                                        <a href="shop-single.html">Salat banana flower</a>
                                    </h6>
                                    <span class="price">
                                        <span>$</span>40
                                    </span>
                                </div>
                            </div>
                            </div>
                            <div class="item">
                            <div class="feature-small">
                                <a href="shop-single.html">
                                    <img src="{{ asset('assets/images/feature-small-2.png') }}" alt="">
                                </a>
                                <div class="item-info">
                                    <h6>
                                        <a href="shop-single.html">Beef steak with red</a>
                                    </h6>
                                    <span class="price">
                                        <span>$</span>56
                                    </span>
                                </div>
                            </div>
                            </div>
                            <div class="item">
                            <div class="feature-small">
                                <a href="shop-single.html">
                                    <img src="{{ asset('assets/images/feature-small-3.png') }}" alt="">
                                </a>
                                <div class="item-info">
                                    <h6>
                                        <a href="shop-single.html">Classic Linguini Fini</a>
                                    </h6>
                                    <span class="price">
                                        <span>$</span>37
                                    </span>
                                </div>
                            </div>
                            </div>
                            <div class="item">
                            <div class="feature-small">
                                <a href="shop-single.html">
                                    <img src="{{ asset('assets/images/feature-small-4.png') }}" alt="">
                                </a>
                                <div class="item-info">
                                    <h6>
                                        <a href="shop-single.html">Salat banana flower</a>
                                    </h6>
                                    <span class="price">
                                        <span>$</span>50
                                    </span>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- NAVIGATION BUTTON -->
                        <span class="lnr lnr-chevron-left" id="feature-prev"></span>
                        <span class="lnr lnr-chevron-right" id="feature-next"></span>
                    </div>
                </div>
                </div>
            </div>
        </div>      
    </div>
    </section>

     <!-- TESTIMONIALS -->
     <section class="section-primary testimonials">
        <div class="container">
            <div class="section-header">
                <!--<h2 class="text-white">Testimonials</h2>-->
                <span>~ O que dizem nossos clientes ~</span>
            </div>
            <!-- OWL-CAROUSEL -->
            <div class="owl-carousel owl-theme" id="testimonials-carousel">
            @foreach($testimonial as $t)
                <div class="item">
                    <div class="testimonials-item">
                        <p>{{ $t->message }}</p>
                        <div class="reporter">
                            <div class="avatar">
                                <img src="{{ asset('assets/images/testimonial') }}/{{ $t->image }}" alt="">
                            </div>
                            <div class="info">
                                <span>{{ $t->position }}</span>
                                <h6>{{ $t->name }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>

    <!-- PARTNER -->
    <div class="partner bg-fa">
        <div class="container-fluid">
            <div class="row justify-content-around text-center">
                @foreach($partners as $p)
                    <div class="col-6 col-md-4 col-xl-2">
                        <a href="#" class="image-holder">
                            <img src="{{ asset('assets/images/partner') }}/{{ $p->image }}" alt="" class="wow zoomIn"> 
                        </a>
                    </div>
                @endforeach
            </div>		
        </div>
    </div>

@endsection