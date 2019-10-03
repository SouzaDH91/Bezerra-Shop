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
    
    <!-- SIGN IN -->
    <section class="section-primary sign-in pt-112 pb-90 col-6 m-auto">
        <div class="container">
            <div class="woocommerce">
                <h4>Login</h4>
                <form action="{{ route('login') }}" method="post" class="woocommerce-form woocommerce-form-login login">
                {!! csrf_field() !!}
                
                    <div class="col-xs-12">
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {!!  $error !!}
                                </div>
                            @endforeach
                        @endif
                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-holder">
                        <label for="login-email">Email <span class="required">*</span></label>
                        <input type="email" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="email" id="login-email" value="{{ old('email') }}" />
                    </div>
                    <div class="form-holder">
                        <label for="login-pass">Senha <span class="required">*</span></label>
                        <input class="woocommerce-Input woocommerce-Input--text input-text form-control" type="password" name="password" id="login-pass">
                    </div>
                    <div class="form-holder last">
                        <button type="submit" class="woocommerce-Button button au-btn round has-bg" name="submit"> Acessar </button>
                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                            <input class="woocommerce-form__input woocommerce-form__input-checkbox" {{ old('remember') ? 'checked' : '' }} name="remember" type="checkbox" id="remember_me"> 
                            lembrar
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <p class="woocommerce-LostPassword lost_password">
                        <a href="{{ route('password.request') }}">Esqueceu a senha?</a>
                        <a href="{{ route('register') }}" class="float-right">Ainda não é cadastrado?</a>
                    </p>
                </form>
            </div>
        </div>
    </section>

@endsection