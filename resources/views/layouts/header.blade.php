<header>
    <!-- HEADER ON DESKTOP -->
    <nav class="navbar-desktop">
        <div class="left">
            <a href="/" class="logo">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo Bezerra Premium">
            </a>
        </div>
        <ul>
            <li class="has-children">
                <a href="#">
                    Categorias
                </a>
                <div class="sub-menu">
                    <div class="wrapper">
                    <ul>
                        @foreach($menubarCat as $mcat)
                        <li>
                            <a href="{{ route('category',['id'=>$mcat->id,'slug'=>str_slug($mcat->name)]) }}">{{ $mcat->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    </div>
                </div>
            </li>
            <li>
                <a href="">
                    Sobre
                </a>
            </li>
            <li>
                <a href="{{ route('contact-us') }}">
                    Contato
                </a>
            </li>
        </ul>
        @if(Auth::check())

            <div class="action">
                <div class="login">
                    Bem vindo,<a href="{{ route('my-account') }}"><i class="fas fa-user-circle mr-2"></i>{{ Auth::user()->first_name }}</a>
                </div>
            </div>

        @else

            <div class="action">
                <div class="login">
                    <a href="{{ route('login') }}">Login</a>
                </div>
            </div>

        @endif

        <div class="right">
            <div class="action">
                <div class="notify">
                    <a href=""><img src="{{ asset('assets/images/notify.png') }}" alt=""></a>
                    <span class="notify-amount">{{ Cart::count() }}</span>
                    <!-- WIDGET SHOPPING -->
                    <div id="woocommerce_widget_cart-2" class="widget woocommerce widget_shopping_cart">
                        <div class="widget_shopping_cart_content">
                            <ul class="woocommerce-mini-cart cart_list product_list_widget" id="cartShow">
                                @foreach(Cart::content() as $cont)
                                    <li class="woocommerce-mini-cart-item mini_cart_item clearfix">
                                        <a data-id="{{ $cont->rowId }}" class="remove remove_from_cart_button delete_cart" aria-label="Remove this item">
                                            <span class="lnr lnr-cross-circle"></span>
                                        </a>					    
                                        <a href="{{ route('product-details',$cont->slug) }}" alt="{{ $cont->name }}" title="{{ $cont->name }}" class="image-holder">
                                            <img src="{{ asset('assets/images/products') }}/{{ $cont->options->image }}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="{{ $cont->name }}">
                                            <span class="product-name">{{ substr($cont->name,0,10) }}..</span>
                                        </a>
                                        <span class="quantity"> 
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol"></span>{{ $basic->symbol }} {{ $cont->price }}
                                            </span>
                                            x {{ $cont->qty }}
                                        </span>					
                                    </li>
                                @endforeach
                            </ul>
                            <p class="woocommerce-mini-cart__total total">
                                <strong>Subtotal:</strong> 
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol"></span>{{ $basic->symbol }}{{ Cart::subtotal() }}
                                </span>
                            </p>
                            <p class="woocommerce-mini-cart__buttons buttons">
                                <a href="{{ route('cart') }}" class="button wc-forward view-cart">Ver carrinho</a>
                                <a href="{{ route('check-out') }}" class="button checkout wc-forward">Pagar</a>
                            </p>
                        </div>
                    </div>
                </div>   
                <span class="lnr lnr-magnifier search-icon" data-toggle="modal" data-target="#modalSearch"></span>
                <span class="lnr lnr-menu menu-sidebar-icon"></span>
            </div>
        </div>
    </nav>

    <!-- HEADER ON MOBILE -->
    <nav class="navbar-mobile">
        <div class="container">
            <div class="heading">
                <div class="left">
                    <div class="navbar-mobile__toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                    </div>
                </div>
                <a href="/" class="logo">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Bezerra Premium">
                </a>
                <div class="right">
                    <div class="action">
                    <div class="notify">
                        <a href=""><img src="{{ asset('assets/images/notify.png') }}" alt="Carrinho"></a>
                        <span class="notify-amount">0</span>
                    </div>   
                    <span class="lnr lnr-magnifier search-icon" data-toggle="modal" data-target="#modalSearch"></span>
                    </div>
                </div>
            </div>
        </div>
        <nav id="main-nav">
            <ul>
                <li class="current">
                    <a href="#" target="_blank">Home</a>
                    <ul>
                    <li class="current">
                        <a href="index.html">HomePage_v1</a>
                    </li>
                    <li>
                        <a href="index-2.html">HomePage_v2</a>
                    </li>
                    <li>
                        <a href="index-3.html">HomePage_v3</a>
                    </li>
                    <li>
                        <a href="index-4.html">HomePage_v4</a>
                    </li>
                    <li>
                        <a href="index-5.html">HomePage_v5</a>
                    </li>
                    <li>
                        <a href="index-6.html">HomePage_v6</a>
                    </li>
                    <li>
                        <a href="index-7.html">HomePage_v7</a>
                    </li>
                    <li>
                        <a href="index-8.html">HomePage_v8</a>
                    </li>
                    <li>
                        <a href="index-9.html">HomePage_v9</a>
                    </li>
                    <li>
                        <a href="index-10.html">HomePage_v10</a>
                    </li>
                    <li>
                        <a href="index-11.html">HomePage_v11</a>
                    </li>
                    <li>
                        <a href="index-12.html">HomePage_v12</a>
                    </li>
                    <li>
                        <a href="index-13.html">HomePage_v13</a>
                    </li>
                    <li>
                        <a href="index-14.html">HomePage_v14</a>
                    </li>
                    <li>
                        <a href="index-15.html">HomePage_v15</a>
                    </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                    Page
                    </a>
                    <ul>
                    <li>
                        <a href="about-us.html">About Us</a>
                    </li>
                    <li>
                        <a href="contact-us.html">Contact Us</a>
                    </li>
                    <li>
                        <a href="coming-soon.html">Coming Soon</a>
                    </li>
                    <li>
                        <a href="#">Gallery</a>
                        <ul>
                            <li>
                                <a href="gallery-three-columns.html">Three Colums</a>
                            </li>
                            <li>
                                <a href="gallery-four-columns.html">Four Columns</a>
                            </li>
                            <li>
                                <a href="gallery-three-columns-wide.html">Three Columns Wide</a>
                            </li>
                            <li>
                                <a href="gallery-four-columns-wide.html">Four Colums Wide</a>
                            </li>
                            <li>
                                <a href="masonry-grid.html">Masonry</a>
                            </li>
                            <li>
                                <a href="masonry-wide.html">Masonry Wide</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="project.html">Project</a>
                    </li>
                    <li>
                        <a href="meet-the-chefs.html">Meet The Cheefs</a>
                    </li>
                    <li>
                        <a href="404.html">404</a>
                    </li>
                    </ul>
                </li>
                <li>
                    <a href="menu.html">
                    Menu
                    </a>
                </li>
                <li>
                    <a href="#">
                    Reservation
                    </a>
                    <ul>
                    <li>
                        <a href="reservation_v1.html">Reservation_v1</a>
                    </li>
                    <li>
                        <a href="reservation_v2.html">Reservation_v2</a>
                    </li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#">
                    Blog
                    </a>
                    <ul>
                    <li>
                        <a href="blog-masonry.html">Blog Masonry</a>
                    </li>
                    <li>
                        <a href="blog-masonry-wide.html">Blog Masonry Wide</a>
                    </li>
                    <li>
                        <a href="blog-standard-right-sidebar.html">Blog Standard Right Sidebar</a>
                    </li>
                    <li>
                        <a href="blog-standard-left-sidebar.html">Blog Standard Left Sidebar</a>
                    </li>
                    <li>
                        <a href="blog-standard-no-sidebar.html">Blog Standard No Sidebar</a>
                    </li>
                    <li>
                        <a href="blog-single.html">Blog Single</a>
                    </li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#">
                    Shop
                    </a>
                    <ul>
                    <li>
                        <a href="shop-list.html">Shop List</a>
                    </li>
                    <li>
                        <a href="shop-three-column.html">Three Columns Grid</a>
                    </li>
                    <li>
                        <a href="shop-three-column-wide.html">Three Columns Wide</a>
                    </li>
                    <li>
                        <a href="shop-four-column.html">Four Colums Grid</a>
                    </li>
                    <li>
                        <a href="shop-four-column-wide.html">Four Colums Wide</a>
                    </li>
                    <li>
                        <a href="shop-cart.html">Shop Cart</a>
                    </li>
                    <li>
                        <a href="shop-single.html">Shop Single</a>
                    </li>
                    <li>
                        <a href="sign-in.html">Sign In</a>
                    </li>
                    <li>
                        <a href="sign-up.html">Sign Up</a>
                    </li>
                    <li>
                        <a href="checkout.html">CheckOut</a>
                    </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </nav> 

    <!-- MODAL SEARCH -->
    <div class="modal-search modal" id="modalSearch" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form method="get" action="{{ route('search-product') }}">
                <input type="text" name="name" placeholder="Pesquise em toda a loja...">
                <button>
                <span class="lnr lnr-magnifier"></span>
                </button>
            </form>
            </div>
        </div>
        <span class="lnr lnr-cross" data-toggle="modal" data-target="#modalSearch"></span>
    </div>

    <!-- MENU SIDEBAR -->
    <div class="menu-sidebar">
    <div class="close-btn">
        <span class="lnr lnr-cross" id="close-icon"></span>
    </div>
    <a href="/" class="logo">
        <img src="{{ asset('assets/images/logo.png') }}" width="200" alt="">
    </a>
    <p class="text">Et harum quidem rerum facilis est et expedita distinctio nam libero.</p>
    <!-- SLIDER -->
    <div class="owl-carousel owl-theme image-slider style-1" id="image-carousel">
        <div class="item">
            <a href="#">
                <img src="{{ asset('assets/images/menu-sidebar-slide-1.jpeg') }}" alt="">
            </a>
        </div>
        <div class="item">
            <a href="#">
                <img src="{{ asset('assets/images/menu-sidebar-slide-2.jpeg') }}" alt="">
            </a>
        </div>
        <div class="item">
            <a href="#">
                <img src="{{ asset('assets/images/menu-sidebar-slide-3.jpeg') }}" alt="">
            </a>
        </div>
    </div>
    <!-- CONTACT -->
    <div class="contact-part">
        <div class="contact-line">
            <span class="lnr lnr-home"></span>
            <span>No 40 Baria Sreet 133/2</span>
        </div>
        <div class="contact-line">
            <a href="tel:+15618003666666">
                <span class="lnr lnr-phone-handset"></span>
                <span> + (156) 1800-366-6666</span>
            </a>
        </div>
        <div class="contact-line">
            <a href="#">
                <span class="lnr lnr-envelope"></span>
                <span> <span class="__cf_email__">[email&#160;protected]</span></span>
            </a>
        </div>
    </div>
    <!-- SOCIAL -->
    <div class="social">
        @foreach($socials as $sc)
            <a href="{{ $sc->link }}">{!! $sc->code !!}</a>
        @endforeach
    </div>
    </div>
</header>