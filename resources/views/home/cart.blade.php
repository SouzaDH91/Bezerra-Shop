@extends('layouts.fontEnd')
@section('content')

    <!-- PAGE BREADCRUMB -->
    <section class="page-breadcrumb" style="background-image: url('{{ asset('assets/images') }}/{{ $basic->breadcrumb }}');">
        <div class="container">
            <div class="row justify-content-between align-content-center">
                <div class="col-md-auto">
                    <h3>{{ $page_title }}</h3>
                </div>
                <div class="col-md-auto">
                    <ul class="au-breadcrumb">
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <span>{{ $page_title }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <!-- SHOP CART -->
    <div class="section-primary shop-cart pt-120 pb-101">
        <div class="container">
            <div class="woocommerce" id="cartFullView">
                <form action="#" class="woocommerce-cart-form">
                    <table class="table-cart shop_table shop_table_responsive cart woocommerce-cart-form__contents table" id="shop_table">
                        <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Produto</th>
                                <th class="product-price">Preço</th>
                                <th class="product-quantity">Quantidade</th>
                                <th class="product-subtotal">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Cart::content() as $con)
                                @php $product = \App\Product::findOrFail($con->id) @endphp
                                <tr id="product_{{$con->rowId}}" class="woocommerce-cart-form__cart-item cart_item">
                                    <td class="product-remove">
                                        <a href="#" data-id="{{ $con->rowId }}" class="remove" aria-label="Remover este item">
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
                                            <input type="text" readonly class="input-text qty text input-quantity" title="Quantidade" value="{{ $con->qty }}" maxlength="{{ $product->stock }}" id="qty{{ $con->id }}" name="qty{{ $con->id }}">
                                            <div class="icon">
                                                <a href="javascript:void(0);" id="btnPlus{{$con->rowId}}" onclick="var result = document.getElementById('qty{{ $con->id }}'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="number-button plus">+</a>
                                                <a href="javascript:void(0);" id="btnMinus{{$con->rowId}}" onclick="var result = document.getElementById('qty{{ $con->id }}'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="number-button minus">-</a>
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
                    <div class="bottom">
                        <a href="{{ route('home') }}" class="button au-btn update-btn has-bd bd-999 round">Continuar comprando</a>
                        <a href="{{ route('check-out') }}" class=" au-btn go-shopping round has-bg au-btn--hover">Pagar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                            toastr.success('Carrinho atualizado com sucesso.');
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
                            toastr.success('Carrinho atualizado com sucesso.');
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

@endsection