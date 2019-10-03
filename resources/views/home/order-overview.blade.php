@extends('layouts.fontEnd')
@section('content')

    <!-- PAGE BREADCRUMB -->
        <section class="page-breadcrumb" style="background-image: url('{{ asset('assets/images') }}/{{ $basic->breadcrumb }}');">
            <div class="container">
                <div class="row justify-content-between align-content-center">
                    <div class="col-md-auto">
                        <h3>Cart</h3>
                    </div>
                    <div class="col-md-auto">
                        <ul class="au-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <a href="shop-cart.html">Cart</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- SHOP CART -->
        <div id="cartFullView" class="section-primary shop-cart pt-120 pb-101">
            <div class="container">
                <div class="woocommerce">
                    <div class="woocommerce-cart-form">
                        <table class="table-cart shop_table shop_table_responsive cart woocommerce-cart-form__contents table" id="shop_table">
                            <thead>
                                <tr>
                                    <th class="product-remove">&nbsp;</th>
                                    <th class="product-thumbnail">Produto</th>
                                    <th class="product-name">Nome</th>
                                    <th class="product-price">Preço</th>
                                    <th class="product-quantity">Quantidade</th>
                                    <th class="product-subtotal">SubTotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Cart::content() as $con)
                                    @php $product = \App\Product::findOrFail($con->id) @endphp
                                    <tr id="product_{{$con->rowId}}" class="woocommerce-cart-form__cart-item cart_item">
                                        <td class="product-remove">
                                            <a href="#" data-id="{{ $con->rowId }}" class="remove" aria-label="Remove this item">
                                                <span class="lnr lnr-cross-circle"></span>
                                            </a>		
                                        </td>

                                        <td class="product-thumbnail">
                                            <a href="{{ route('product-details',$product->slug) }}">
                                                <img src="{{ asset('assets/images/products') }}/{{$con->options->image}}" width="90" height="90" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="{{ $con->name }}">
                                            </a>						
                                        </td>

                                        <td class="product-name" data-title="Product">
                                            <a href="{{ route('product-details',$product->slug) }}">{{ $con->name }}</a>	
                                        </td>

                                        <td class="product-price" data-title="Price">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>{{$basic->symbol}}{{ $con->price }}</span>	
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity">
                                                <input type="text" class="input-text qty text input-quantity" value="{{ $con->qty }}" maxlength="{{ $product->stock }}" id="qty{{ $con->id }}" name="qty{{ $con->id }}">
                                                <div class="icon">
                                                    <a href="#" id="btnPlus{{$con->rowId}}" onclick="var result = document.getElementById('qty{{ $con->id }}'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="number-button plus">+</a>
                                                    <a href="#" id="btnMinus{{$con->rowId}}" onclick="var result = document.getElementById('qty{{ $con->id }}'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="number-button minus">-</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Total">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>{{$basic->symbol}}{{ $con->price * $con->qty  }}</span>		
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="product-remove none">Subtotal: {{ $basic->symbol }}{{ Cart::subtotal() }}</td>
                                    <td colspan="3" class="actions">
                                        <div class="coupon">
                                            Taxa: {{ $basic->symbol }}{{ Cart::tax() }}
                                        </div>
                                    </td>
                                    <td colspan="2" class="cart-subtotal">
                                        <label>Total:</label>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol"></span>{{ $basic->symbol }}{{ Cart::total() }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <h3>Escolha a forma de pagamento</h3>
                        <div class="row">
                            <div class="col m-auto">
                                <span class="mr-5">
                                    <a href="#" id="payment-billet"><img src="{{ asset('assets/images/payment/boleto.png') }}" width="128" alt="Boleto"></a>
                                    <p>Boleto</p>
                                </span>
                            </div>
                            <div class="col m-auto">
                                <span>
                                    <a href=""><img src="{{ asset('assets/images/payment/credit-card.png') }}" alt="Cartão de credito"></a>
                                    <p>Cartão de crédito</p>
                                </span>
                            </div>
                        </div>
                        <div class="preloader" style="display: none;">
                            <img src="{{asset('assets/images/preloader.gif')}}" alt="Preloader" style="max-width: 50px;">
                            <p>Gerando Pedido, aguarde!</p>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="cart-total-table address-box commun-table mb-30">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Endereço de Cobrança</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <ul>
                                                        <li class="inner-heading">
                                                            <b>{{ $userDetails->s_name }}</b>
                                                        </li>
                                                        <li>
                                                            <p>{{ $userDetails->s_company }}, ({{ $userDetails->s_area_code }}) {{ $userDetails->s_number }}</p>
                                                        </li>
                                                        <li>
                                                            <p>{{ $userDetails->s_email }}</p>
                                                        </li>
                                                        <li>
                                                            <p>{{ $userDetails->s_landmark }}</p>
                                                        </li>
                                                        <li>
                                                            <p>{{ $userDetails->s_address }}, {{ $userDetails->s_addr_numb }}</p>
                                                        </li>
                                                        <li>
                                                            <p>{{ $userDetails->s_zip }}, {{ $userDetails->s_city }}, {{ $userDetails->s_state }}, {{ $userDetails->s_country }}</p>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="cart-total-table address-box commun-table">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Endereço de entrega</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td style="padding: 13px">
                                                    <ul>
                                                        <li class="inner-heading">
                                                            <b>{{ $userDetails->b_name }}</b>
                                                        </li>
                                                        <li>
                                                            <p>{{ $userDetails->b_company }}, ({{ $userDetails->b_area_code }}) {{ $userDetails->b_number }}</p>
                                                        </li>
                                                        <li>
                                                            <p>{{ $userDetails->b_email }}</p>
                                                        </li>
                                                        <li>
                                                            <p>{{ $userDetails->b_zip }}, {{ $userDetails->b_city }}, {{ $userDetails->b_state }}</p>
                                                        </li>
                                                        <li>
                                                            <p>{{ $userDetails->b_country }}</p>
                                                        </li>
                                                    </ul>
                                                    <br>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom">
                        <a href="{{route('home')}}" class=" au-btn update-btn has-bd bd-999 round">Continuar comprando</a>
                            <!-- <form class="float-right" action="{{route('confirm-order')}}" method="post">
                                {!! csrf_field() !!}
                                <button class="button au-btn go-shopping round has-bg au-btn--hover"><i class="fa fa-send"></i> Confirmar & Enviar</button>
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('home.preloader')
@endsection
@section('scripts')

    @foreach(Cart::content() as $con)

        <script>
            var url = '{{ url('/') }}';
            $(document).ready(function () {
                $(document).on("click", '#btnMinus{{$con->rowId}}', function (e) {
                    var qty = $('#qty{{ $con->id }}').val();
                    $.get(url + '/update-cart-item/' + '{{ $con->rowId }}'+'/'+qty,function (data) {
                        var result = $.parseJSON(data);
                        if (result['cartError'] == "yes"){
                            toastr.warning(result['cartErrorMessage']);
                        }else{
                            toastr.success('Cart Updated Successfully.');
                            $('#cartShow').empty();
                            $('#cartShow').append(result['cartShow']);
                            $('#cartFullView').empty();
                            var div = document.getElementById('cartFullView');
                            div.innerHTML = result['fullShow'];
                        }
                    });
                });
                $(document).on("click", '#btnPlus{{$con->rowId}}', function (e) {
                    var qty = $('#qty{{ $con->id }}').val();
                    $.get(url + '/update-cart-item/' + '{{ $con->rowId }}'+'/'+qty,function (data) {
                        var result = $.parseJSON(data);
                        if (result['cartError'] == "yes"){
                            toastr.warning(result['cartErrorMessage']);
                        }else{
                            toastr.success('Cart Updated Successfully.');
                            $('#cartShow').empty();
                            $('#cartShow').append(result['cartShow']);
                            $('#cartFullView').empty();
                            var div = document.getElementById('cartFullView');
                            div.innerHTML = result['fullShow'];
                        }
                    });
                });

            });
        </script>

    @endforeach

    <!--URL PagSeguro Transparent-->
<script src="{{config('pagseguro.url_transparent_js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    $(function(){
        $("#payment-billet").click(function(){
            setSessionId();
            
            $(".preloader").show();
            
            return false;
        });
    });
    
    function setSessionId()
    {
        axios.get("{{route('pagseguro.code.transparent')}}")
        .then(response => {
            console.log(response);
            PagSeguroDirectPayment.setSessionId(response);
            paymentBillet();
        }).catch(error => {
            $(".preloader").hide();
            alert("Fail request... :-(");
            console.log(error);
        }).finally(() => {});
    }
    
    function paymentBillet()
    {
        var sendHash = PagSeguroDirectPayment.getSenderHash();

        axios.post("{{route('confirm-order')}}", {
            data: {sendHash: sendHash},
            dataType: 'json',
            ContentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).then(response => {
            console.log(response);
            
            if(response.data.success) {
                location.href=response.data.payment_link;
            } else {
                alert("Falha!");
            }
        }).catch(error => {
            alert("Fail request... :-(");
            $(".preloader").hide();
            console.log(error);
        });
    }
</script>

@endsection

