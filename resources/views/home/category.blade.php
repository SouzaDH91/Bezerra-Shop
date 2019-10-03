@extends('layouts.fontEnd')
@section('content')

    <!-- PAGE INFO -->
    <section class="page-info set-bg" style="background-image: url('{{ URL::asset('/assets/images')}}/{{ $basic->breadcrumb }}');">
        <div class="section-header">
            <span>~ {{ $page_title }} ~</span>
        </div>
    </section>
    
    <!-- SHOP LIST -->
    <section class="section-primary pt-150 pb-113 shop-list">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    
                    <div class="row products">
                        @if(count($product) != 0)
                            @foreach($product->chunk(3) as $fPro)
                                @foreach($fPro as $fp)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="item {{ $fp->stock == 0 ? 'sold-out' : ''}}">
                                            <div class="thumb">
                                                <a href="{{ route('product-details',$fp->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                    <img src="{{ asset('assets/images/products') }}/{{ $fp->image }}" width="270" height="319" alt="{{ $fp->name }}">
                                                </a>
                                                <a href="javascript:void(0);" class="button product_type_simple add_to_cart_button ajax_add_to_cart SingleCartAdd" data-id="{{ $fp->id }}">Adicionar</a>
                                            </div>
                                            <div class="info">
                                                <h5 class="woocommerce-loop-product__title">
                                                    <a href="{{ route('product-details',$fp->slug) }}">{{ substr($fp->name,0,30) }}</a>
                                                </h5>
                                                <div class="star-rating">
                                                    @php
                                                        $totalReview = \App\Review::whereProduct_id($fp->id)->count();
                                                        if ($totalReview == 0){
                                                            $finalRating = 0;
                                                        }else{
                                                            $totalRating = \App\Review::whereProduct_id($fp->id)->sum('rating');
                                                            $finalRating = round($totalRating / $totalReview);
                                                        }
                                                    @endphp
                                                    {!! \App\TraitsFolder\CommonTrait::viewRating($finalRating) !!}
                                                </div>
                                                <span class="price">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol"></span>{{$basic->symbol}}{{ $fp->current_price }}
                                                        @if($fp->old_price != null)
                                                            <del class="price old-price">{{$basic->symbol}}{{ $fp->old_price }}</del>
                                                        @endif
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        @endif
                    </div>
                    <div class="woocommerce-pagination">
                        {!! $product->links('home.pagination') !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sidebar">
                        <!-- FILTER -->
                        <div class="widgets woocommerce widget_price_filter">
                            <div class="widget-title">
                                <h5>Filtrar por preço</h5>
                            </div>
                            <form action="{{ route('price-range') }}" method="get">
                                <div class="price_slider_wrapper">
                                    <div id="slider"></div>
                                    <div class="price_slider_amount">
                                        <div class="price_label">
                                            Preço: 
                                            <span class="from">
                                                R$<span id="lower-value"></span>
                                            </span> — 
                                            <span class="to">
                                                R$<span id="upper-value"></span>
                                            </span>
                                        </div>
                                        <button type="submit" class="button">Filtrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- CATEGORIES -->
                        <div class="widgets widget_categories">
                            <div class="widget-title">
                                <h5>Categorias</h5>
                            </div>
                            <ul>
                                @foreach($category as $cat)
                                    <li>
                                        <a href="{{ route('category',['id'=>$cat->id,'slug'=>str_slug($cat->name)]) }}">{{ $cat->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- FEATURED PRODUCT -->
                        <div class="widgets woocommerce widget_featured_product">
                            <div class="widget-title">
                                <h5>Produtos</h5>
                            </div>
                            <div class="featured-product">
                                <div class="featured-product__item">
                                    <a href="shop-single.html" class="thumb">
                                        <img src="{{ asset('assets/images/featured-product-1.png') }}" alt="">
                                    </a>
                                    <div class="info">
                                        <h6 class="woocommerce-loop-product__title">
                                            <a href="shop-single.html">Spicy Garlic Lime</a>
                                        </h6>
                                        <span class="price">
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">$</span>26
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="featured-product__item">
                                    <a href="shop-single.html" class="thumb">
                                        <img src="{{ asset('assets/images/featured-product-2.png') }}" alt="">
                                    </a>
                                    <div class="info">
                                        <h6 class="woocommerce-loop-product__title">
                                            <a href="shop-single.html">Baked Teriyaki</a>
                                        </h6>
                                        <span class="price">
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">$</span>12
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="featured-product__item">
                                    <a href="shop-single.html" class="thumb">
                                        <img src="{{ asset('assets/images/featured-product-3.png') }}" alt="">
                                    </a>
                                    <div class="info">
                                        <h6 class="woocommerce-loop-product__title">
                                            <a href="shop-single.html">Brown Sugar Meatloaf </a>
                                        </h6>
                                        <span class="price">
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">$</span>13
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="featured-product__item">
                                    <a href="shop-single.html" class="thumb">
                                        <img src="{{ asset('assets/images/featured-product-4.png') }}" alt="">
                                    </a>
                                    <div class="info">
                                        <h6 class="woocommerce-loop-product__title">
                                            <a href="shop-single.html">The Best Meatloaf </a>
                                        </h6>
                                        <span class="price">
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">$</span>19
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- BANNER -->
                        <div class="widgets widget_banner">
                            <a href="#">
                                <img src=" {{ asset('assets/images/widget-banner.jpeg') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')

    <script>
        $(document).ready(function() {

            $( "#slider" ).slider({
                range: true,
                min: 0,
                max: 1000,
                values: [ 180, 800 ],
                slide: function( event, ui ) {
                    $( "#lower-value" ).val("{{ $basic->symbol }}"+ui.values[ 0 ]+"-{{ $basic->symbol }}" + ui.values[ 1 ]);
                }
            });
            $( "#lower-value" ).val("{{ $basic->symbol }}"+$( "#slider" ).slider("values",0)+ "-{{ $basic->symbol }}"+$( "#slider" ).slider( "values", 1));
        });
    </script>

@endsection