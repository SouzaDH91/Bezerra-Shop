@extends('layouts.fontEnd')
@section('style')

@endsection
@section('meta')
    <meta name="keywords" content="{{ $product->tags }}">
    <meta name="description" content="{{ strip_tags($product->description) }}">
    <meta property="og:title" content="{{ $product->name }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('assets/images/products') }}/{{ $product->image }}" />
    
@section('content')

    <!-- PAGE INFO -->
    <section class="page-info set-bg" style="background-image: url('{{ URL::asset('/assets/images')}}/{{ $basic->breadcrumb }}');">
        <div class="section-header">
            <h1 class="text-white">Shop single</h1>
            <span>~ Delicious food ~</span>
        </div>
    </section>
    
    <!-- SHOP SINGLE -->
    <section class="section-primary pt-150 pb-113 shop-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images">
                        <figure class="woocommerce-product-gallery__wrapper">
                            <div class="woocommerce-product-gallery__image">
                                @foreach($productImage as $pi)
                                    <img id="zoom-image" width="570" height="488" class="attachment-shop_single size-shop_single wp-post-image" src="{{ asset('assets/images/products') }}/{{ $pi->name }}" data-zoom-image="{{ asset('assets/images/products') }}/{{ $pi->name }}" alt="{{ $product->name }}">
                                @endforeach
                            </div>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="summary entry-summary">
                        <h3 class="product_title entry-title">{{ $product->name }}</h3>
                        <div class="info">
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol"></span>{{ $basic->symbol }}{{ $product->current_price }}</span> @if($product->old_price != null)<del class="price old-price bold">{{ $basic->symbol }}{{ $product->old_price }}</del>@endif
                                </span>
                            </span>
                            @php
                                $totalReview = \App\Review::whereProduct_id($product->id)->count();
                                if ($totalReview == 0){
                                    $finalRating = 0;
                                }else{
                                    $totalRating = \App\Review::whereProduct_id($product->id)->sum('rating');
                                    $finalRating = round($totalRating / $totalReview);
                                }
                            @endphp
                            <span>
                                {!! \App\TraitsFolder\CommonTrait::viewRating($finalRating) !!}
                            </span>
                        </div>
                        
                        <form class="cart" method="post" action="">
                        {!! csrf_field() !!}
                            <div class="quantity">
                                <input type="text" class="input-text qty text" max="{{ $product->stock }}" name="qty" value="1" title="Qty" size="4" id="qty">
                                <div class="icon">
                                    <a href="#" type="button" onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="number-button plus">+</a>
                                    <a href="#" type="button" onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="number-button minus">-</a>
                                </div>
                            </div>
                            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                            <button type="button" name="add-to-cart" class="single_add_to_cart_button button alt au-btn round has-bg au-btn--hover addCart">Adicionar</button>
                        </form>
                        <div class="product_meta">
                            <span class="sku_wrapper">Disponível: <span class="sku">
                                @if($product->stock == 0)
                                    <span class="info-deta">Esgotado</span>
                                @elseif($product->stock < 10)
                                    <span class="info-deta">Poucas peças</span>
                                @else
                                    <span class="info-deta">Em estoque</span>
                                @endif
                            </span></span>
                            <span class="sku_wrapper">SKU: <span class="sku">{{ $product->sku }}</span></span>
                            <span class="posted_in">Categoria: <a href="#" rel="tag">{{ $product->cat_name }}</a></span>
                            <span class="tagged_as">Tags: 
                                @foreach($productTag as $pTag)
                                    <a href="#" rel="tag">#{{$pTag}}</a>
                                @endforeach
                            </span>
                        </div>
                        <div class="social">
                            <a href="#">
                                <i class="zmdi zmdi-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="zmdi zmdi-facebook-box"></i>
                            </a>
                            <a href="#">
                                <i class="zmdi zmdi-linkedin"></i>
                            </a>
                            <a href="#">
                                <i class="zmdi zmdi-instagram"></i>
                            </a>
                        </div>
                    </div>		
                </div>
            </div>
            <!-- WOOCOMMERCE TABS -->
            <div class="woocommerce-tabs wc-tabs-wrapper">
                <div id="shop-single-tab">
                    <ul class="tabs wc-tabs">
                        <li class="description_tab">
                            <a href="#description">Descrição</a>
                        </li>
                        <li class="additional_information_tab">
                            <a href="#add-info">Informações adicionais</a>
                        </li>
                        <li class="reviews_tab">
                            <a href="#review">Avaliações</a>
                        </li>
                    </ul>
                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab" id="description">
                        <p>{!! $product->description !!}</p>
                    </div>
                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--additional_information panel entry-content wc-tab" id="add-info">
                        <table class="shop_attributes">
                            <tbody>
                                <tr>
                                    <th>Peso</th>
                                    @foreach($productSpecification as $ps)
                                        <td class="product_weight">{{ $ps->specification }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @if(Auth::check())

                        @php $userReviewCount = \App\Review::whereUser_id(Auth::user()->id)->whereProduct_id($product->id)->count();@endphp

                        @if($userReviewCount != 0)
                            @php $userReview = \App\Review::whereUser_id(Auth::user()->id)->whereProduct_id($product->id)->first();@endphp
                            <div class="comments-area">
                                <h3 class="form-label">Sua avaliação</h3>
                                <ul class="comment-list mt-30">
                                    <li>
                                        <div class="comment-user">
                                            <img class="img-circle" width="80%" src="{{ asset('assets/images/user') }}/{{ $userReview->user->image }}" alt="{{ $userReview->user->name }}"> </div>
                                        <div class="comment-detail">
                                            <div class="user-name">{{ $userReview->user->first_name }} {{ $userReview->user->last_name }}</div>
                                            <div class="post-info">
                                                <ul>
                                                    <li>{{ \Carbon\Carbon::parse($userReview->created_at)->format('M d, Y - h:i:s A')  }}</li>
                                                </ul>
                                            </div>
                                            <p style="margin-bottom: 0px">{!! \App\TraitsFolder\CommonTrait::viewRating($userReview->rating) !!} - <span class="review_score">{{ $rv->rating }}/5</span></p>
                                            <p>{{ $userReview->comment }}</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <div id="review" class="woocommerce-Reviews">
                                <div id="comments">
                                    <h6 class="woocommerce-noreviews">
                                        Seja o primeiro a avaliar
                                    </h6>
                                </div>
                                <div id="review_form_wrapper">
                                    <div id="review_form">
                                        <div id="respond" class="comment-respond">
                                            <form action="{{ route('review-submit') }}" method="post" id="comments-form" class="comments-form">
                                            {!! csrf_field() !!}
                                                <p class="comment-notes">Seu endereço de e-mail não será publicado. Campos obrigatórios são marcados.</p>
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <div class="col-xs-12">
                                                    @if($errors->any())
                                                        @foreach ($errors->all() as $error)
                                                            <div class="alert alert-danger alert-dismissable">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                                {!!  $error !!}
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="comment-form-rating">
                                                    <label>Sua avaliação</label>
                                                        <span class="star-rating">
                                                        <input name="rating" id="rating-1" value="1" type="radio" required="">
                                                        <label for="rating-1" class="zmdi zmdi-star"></label>
                                                        <input name="rating" id="rating-2" value="2" type="radio" required="">
                                                        <label for="rating-2" class="zmdi zmdi-star"></label>
                                                        <input name="rating" id="rating-3" value="3" type="radio" required="">
                                                        <label for="rating-3" class="zmdi zmdi-star"></label>
                                                        <input name="rating" id="rating-4" value="4" type="radio" required="">
                                                        <label for="rating-4" class="zmdi zmdi-star"></label>
                                                        <input name="rating" id="rating-5" value="5" type="radio" required="">
                                                        <label for="rating-5" class="zmdi zmdi-star"></label>
                                                    </span>
                                                </div>
                                                <p class="comment-form-comment">
                                                    <textarea id="comment" name="comment" class="form-control" required="" placeholder="Seu cometário"></textarea>
                                                </p>
                                                <p class="form-submit">
                                                    <button name="submit" type="submit" id="submit" class="submit au-btn round has-bg">Enviar</button> 
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                    <div id="review" class="woocommerce-Reviews">
                        <div class="alert alert-secondary alert-dismissable col-md-6">
                            Você precisa está logado para poder avaliar este produto. <a href="{{ route('login') }}">Logar</a> ou <a href="{{ route('register') }}">Cadastrar</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!-- RELATED PRODUCT -->
            <div class="related products">
                <h4>Produtos Relacionados</h4>	
                <div class="row">
                    @foreach($relatedProduct as $rp)
                        <div class="col-md-4 col-lg-3">
                            <div class="item">
                                <div class="thumb">
                                    <a href="{{ route('product-details',$rp->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                        <img src="{{ asset('assets/images/products') }}/{{ $rp->image }}" alt="{{ $rp->name }}">
                                    </a>
                                    <a href="javascript:void(0);" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Adicionar</a>
                                </div>
                                <div class="info">
                                    <h5 class="woocommerce-loop-product__title">
                                        <a href="{{ route('product-details',$rp->slug) }}">{{ substr($rp->name,0,30) }}</a>
                                    </h5>
                                    @php
                                        $totalReview = \App\Review::whereProduct_id($product->id)->count();
                                        if ($totalReview == 0){
                                            $finalRating = 0;
                                        }else{
                                            $totalRating = \App\Review::whereProduct_id($product->id)->sum('rating');
                                            $finalRating = round($totalRating / $totalReview);
                                        }
                                    @endphp
                                    <div>
                                        {!! \App\TraitsFolder\CommonTrait::viewRating($finalRating) !!}
                                    </div>
                                    <span class="price">
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol"></span>{{$basic->symbol}}{{ $rp->current_price }}</span> @if($product->old_price != null)<del class="price old-price bold">{{ $basic->symbol }}{{ $rp->old_price }}</del>@endif
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <meta name="_token" content="{!! csrf_token() !!}" />                                    
@endsection
@section('scripts')

    <script>
        $(document).ready(function() {

            $( "#slider" ).slider({
                range: true,
                min: 0,
                max: 1000,
                values: [ 1, 800 ],
                slide: function( event, ui ) {
                    $( "#lower-value" ).val("{{ $basic->symbol }}"+ui.values[ 0 ]+"-{{ $basic->symbol }}" + ui.values[ 1 ]);
                }
            });
            $( "#lower-value" ).val("{{ $basic->symbol }}"+$( "#slider" ).slider("values",0)+ "-{{ $basic->symbol }}"+$( "#slider" ).slider( "values", 1));
        });
    </script>
    <script>

        var url = '{{ url('/add-to-cart') }}';

        $(".addCart").click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            e.preventDefault();
            var formData = {
                product_id: $('#product_id').val(),
                qty: $('#qty').val()
            };
            var type = "POST";
            var my_url = url;
            console.log(formData);
            $.ajax({
                type: type,
                url: my_url,
                data: formData,
                success: function (data) {
                    var result = $.parseJSON(data);
                    if (result['cartError'] == "yes"){
                        toastr.warning(result['cartErrorMessage']);
                    }else{
                        toastr.success('Product Added To Cart.');
                        $('#cartShow').empty();
                        $('#cartShow').append(result['cartShowFinal']);
                    }
                },
                error: function(data)
                {
                    $.each( data.responseJSON.errors, function( key, value ) {
                        toastr.error( value);
                    });
                }
            });
        });


    </script>

@endsection