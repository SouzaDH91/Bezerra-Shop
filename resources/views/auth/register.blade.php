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

    <!-- SIGN UP -->
    <section class="section-primary col-6 sign-up pt-112 pb-90 m-auto">
        <div class="container">
            <h4>Insira seus dados</h4>
            <form name="cadastroCliente" id="cadastroCliente" method="post" action="{{ route('register') }}">
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
                </div>
                <div class="row">
                    <div class="form-holder col">
                        <label for="f-name">Nome</label>
                        <input type="text" name="first_name" id="f-name" class="form-control" value="{{ old('first_name') }}" required>
                    </div>
                    <div class="form-holder col">
                        <label for="l-name">Sobrenome</label>
                        <input type="text" name="last_name" id="l-name" class="form-control" value="{{ old('last_name') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-holder col">
                        <label>Nascimento</label>
                        <input type="text" name="birth" id="birth" value="{{ old('birth') }}" required class="form-control">
                    </div>
                    <div class="form-holder col">
                        <label>CPF</label>
                        <input type="text" name="cpf" id="cpf" value="{{ old('cpf') }}" required class="form-control">
                    </div>
                </div>

                <div class="form-holder">
                    <label for="login-email">Email</label>
                    <input type="text" name="email" id="login-email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="row">
                    <div class="form-holder col">
                        <label for="login-pass">Senha</label>
                        <input type="password" name="password" id="login-pass" required class="form-control">
                    </div>
                    <div class="form-holder col">
                        <label for="re-enter-pass">Confirmar senha</label>
                        <input type="password" name="password_confirmation" id="re-enter-pass" required class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 mb-20">
                    <div class="check-box">
                        <span>
                            <input type="checkbox" name="agree" required class="checkbox">
                            </span>
                        <label for="agree">Eu aceito todos <a href="{{ route('terms-condition') }}" class="link">Termos & Condições</a> e <a class="link" href="{{ route('privacy-policy') }}">Política de privacidade</a> </label>
                    </div>
                </div>

                <button class="au-btn round has-bg" type="submit" name="submit">Cadastrar</button>
                <span class="float-right">Já é cadastrado? <a href="{{ route('login') }}" class="return-link">Faça login</a></span>
            </form>
        </div>
    </section>

@endsection