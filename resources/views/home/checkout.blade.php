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
    
    <!-- SHOPPING CHECKOUT -->
    <section class="checkout-page section-primary pt-120">
        <div class="container">
            <div class="woocommerce">
                <div class="checkout-step mb-40">
                    <ul>
                        <li class="active"> <a href="{{ route('check-out') }}">
                                <div class="step">
                                    <div class="line"></div>
                                    <div class="circle">1</div>
                                </div>
                                <span>Shipping</span> </a> </li>
                        <li> <a href="{{ route('oder-overview') }}">
                                <div class="step">
                                    <div class="line"></div>
                                    <div class="circle">2</div>
                                </div>
                                <span>Order Overview</span> </a> </li>
                        <li> <a>
                                <div class="step">
                                    <div class="line"></div>
                                    <div class="circle">3</div>
                                </div>
                                <span>Payment</span> </a> </li>
                        <li> <a>
                                <div class="step">
                                    <div class="line"></div>
                                    <div class="circle">4</div>
                                </div>
                                <span>Order Complete</span> </a> </li>
                        <li>
                            <div class="step">
                                <div class="line"></div>
                            </div>
                        </li>
                    </ul>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-xs-12 mt-3 mb-5">
                        <h3 class="center">Por favor, preencha seus dados para envio</h3>
                    </div>
                </div>
                <form method="post" action="{{ route('submit-details') }}" class="checkout woocommerce-checkout">
                {!! csrf_field() !!}
                @if($userDetails== null)  
                    <div class="row">
                        <div class="col-md-6">
                            <div class="woocommerce-billing-fields">
                                <h5>Endreço para entrega</h5>
                                <div class="woocommerce-billing-fields__field-wrapper">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field">
                                                <label>Nome 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="text" name="s_name" value="{{ $user->first_name }} {{ $user->last_name }}" required>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                                <label>Email
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="email" name="s_email" value="{{ $user->email }}" required>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field">
                                                <label>Titulo de entrega 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="text" name="s_company" required>
                                            </p>
                                        </div>
                                    
                                        <div class="col-md-2">
                                            <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                                <label>DDD
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="text" name="s_area_code" required>
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                                <label>Telefone
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="text" name="s_number" required>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="billing_country_field">
                                                <label>País 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <select class="form-control country_to_state country_select select2-hidden-accessible" id="billing_country" name="s_country" aria-hidden="true" tabindex="-1" autocomplete="country">
                                                    <option selected="" value="">Selecione o país</option>
                                                    @foreach($country as $cc => $value)
                                                        <option value="{{ $value }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>  
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label>Estado 
                                                    <span class="required" title="required">*</span></label>
                                                <input type="text" class="form-control" name="s_state" required placeholder="" value="" autocomplete="address-level2">
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="billing_country_field">
                                                <label>Cidade 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="s_city" required placeholder="" value="" autocomplete="address-level2">
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label>CEP 
                                                    <span class="required" title="required">*</span></label>
                                                <input type="text" class="form-control" name="s_zip" required placeholder="" value="" autocomplete="address-level2">
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
                                                <label>Endereço 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input type="text" name="s_address" required class="form-control"/>
                                            </p>
                                        </div>

                                        <div class="col-md-4">
                                        <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
                                                <label>Número 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input type="text" name="s_addr_numb" required class="form-control"/>
                                            </p>
                                        </div>
                                    </div>

                                    <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
                                        <label for="s_landmark" class="">Ponto de referência 
                                            <span class="required" title="required">*</span></label>
                                        <input type="text" class="form-control" name="s_landmark" required id="s_landmark" placeholder="" autocomplete="address-level2">
                                        <span>Inclua um ponto de referência (por exemplo, Banco oposto), pois o serviço de operadora pode achar mais fácil localizar seu endereço.</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="woocommerce-checkout-review-order-wrap">
                                <h5 id="order_review_heading">Endereço de cobrança</h5>

                                <div class="woocommerce-billing-fields__field-wrapper">
                                <div class="row">
                                        <div class="col-md-6">
                                            <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field">
                                                <label>Nome 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="text" name="b_name" value="{{ $user->first_name }} {{ $user->last_name }}" required>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                                <label for="b_email">Email
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="email" name="b_email" value="{{ $user->email }}" required>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field">
                                                <label>Titulo de entrega 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="text" name="b_company" required>
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field">
                                                <label>Número 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="text" name="b_addr_numb" required>
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                                <label>DDD
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="text" name="b_area_code" required>
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                                <label>Telefone
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="text" name="b_number" required>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="billing_country_field">
                                                <label for="billing_country">País 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <select class="form-control country_to_state country_select select2-hidden-accessible" id="billing_country" name="b_country" id="shippingcountryid" aria-hidden="true" tabindex="-1" autocomplete="country">
                                                    <option selected="" value="">Selecione o país</option>
                                                    @foreach($country as $cc => $value)
                                                        <option value="{{ $value }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>  
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label>Estado 
                                                    <span class="required" title="required">*</span></label>
                                                <input type="text" class="form-control" name="b_state" required value="" autocomplete="address-level2">
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="billing_country_field">
                                                <label>Cidade 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="b_city" required placeholder="" value="" autocomplete="address-level2">
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label>CEP 
                                                    <span class="required" title="required">*</span></label>
                                                <input type="text" class="form-control" name="b_zip" required>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-row place-order">
                                        <button type="submit" class="button alt au-btn round has-bg">Próximo</button>
                                    </div>
                                </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                <div class="row">
                        <div class="col-md-6">
                            <div class="woocommerce-billing-fields">
                                <h5>Endreço para entrega</h5>
                                <div class="woocommerce-billing-fields__field-wrapper">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field">
                                                <label>Nome 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="text" name="s_name" value="{{ $user->first_name }} {{ $user->last_name }}" required>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                                <label>Email
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="email" name="s_email" value="{{ $user->email }}" required>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field">
                                                <label>Titulo de entrega 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="text" name="s_company" value="{{ $userDetails->s_company }}" required>
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                                <label>DDD
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="text" name="s_area_code" value="{{ $userDetails->s_area_code }}" required>
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                                <label>Telefone
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="text" name="s_number" value="{{ $userDetails->s_number }}" required>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="billing_country_field">
                                                <label for="billing_country">País 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <select class="form-control country_to_state country_select select2-hidden-accessible" id="billing_country" name="s_country" aria-hidden="true" tabindex="-1" autocomplete="country">
                                                    <option selected="" value="">Selecione o país</option>
                                                    @foreach($country as $cc => $value)
                                                        @if($userDetails->s_country == $value)
                                                        <option value="{{ $value }}" selected>{{ $value }}</option>
                                                        @else
                                                        <option value="{{ $value }}">{{ $value }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>  
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label>Estado 
                                                    <span class="required" title="required">*</span></label>
                                                <input type="text" class="form-control" name="s_state" value="{{ $userDetails->s_state }}" required autocomplete="address-level2">
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="billing_country_field">
                                                <label>Cidade 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="s_city" value="{{ $userDetails->s_city }}" required>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label>CEP 
                                                    <span class="required" title="required">*</span></label>
                                                <input type="text" class="form-control" name="s_zip" value="{{ $userDetails->s_zip }}" required>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
                                                <label>Endereço 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input type="text" name="s_address" required class="form-control" value="{{ $userDetails->s_address }}" />
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
                                                <label>Número 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input type="text" name="s_addr_numb" required class="form-control" value="{{ $userDetails->s_addr_numb }}" />
                                            </p>
                                        </div>
                                    </div>
                                    <p class="form-row form-row-wide address-field validate-required" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
                                        <label for="s_landmark" class="">Ponto de referência 
                                            <span class="required" title="required">*</span></label>
                                        <input type="text" class="form-control" name="s_landmark" value="{{ $userDetails->s_landmark }}" required id="s_landmark" placeholder="" autocomplete="address-level2">
                                        <span>Inclua um ponto de referência (por exemplo, Banco oposto), pois o serviço de operadora pode achar mais fácil localizar seu endereço.</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="woocommerce-checkout-review-order-wrap">
                                <h5 id="order_review_heading">Endereço de cobrança</h5>

                                <div class="woocommerce-billing-fields__field-wrapper">
                                <div class="row">
                                        <div class="col-md-6">
                                            <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field">
                                                <label>Nome 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="text" name="b_name" value="{{ $user->first_name }} {{ $user->last_name }}" required>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                                <label>Email
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="email" name="b_email" value="{{ $user->email }}" required>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field">
                                                <label>Titulo de entrega 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="text" name="b_company" value="{{ $userDetails->b_company }}" required>
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field">
                                                <label>Número 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="text" name="b_addr_numb" value="{{ $userDetails->b_addr_numb }}" required>
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                                <label>DDD
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="text" name="b_area_code" value="{{ $userDetails->b_area_code }}" required>
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                                <label>Telefone
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input class="form-control" type="text" name="b_number" value="{{ $userDetails->b_number }}" required>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="billing_country_field">
                                                <label for="billing_country">País 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <select class="form-control country_to_state country_select select2-hidden-accessible" id="billing_country" name="b_country" id="shippingcountryid" aria-hidden="true" tabindex="-1" autocomplete="country">
                                                    <option selected="" value="">Selecione o país</option>
                                                    @foreach($country as $cc => $value)
                                                        @if($userDetails->b_country == $value)
                                                        <option value="{{ $value }}" selected>{{ $value }}</option>
                                                        @else
                                                        <option value="{{ $value }}">{{ $value }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>  
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label>Estado 
                                                    <span class="required" title="required">*</span></label>
                                                <input type="text" class="form-control" name="b_state" value="{{ $userDetails->b_state }}" required>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="billing_country_field">
                                                <label>Cidade 
                                                    <span class="required" title="required">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="b_city" value="{{ $userDetails->b_city }}" required>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label for="b_zip" class="">CEP 
                                                    <span class="required" title="required">*</span></label>
                                                <input type="text" class="form-control" name="b_zip" value="{{ $userDetails->b_zip }}" required>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-row place-order">
                                    <button type="submit" class="button alt au-btn round has-bg" id="place_order">Próximo</button>
                                    </div>
                                </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                </form>

            </div>
        </div>
    </section>

@endsection