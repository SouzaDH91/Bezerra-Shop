@extends('layouts.fontEnd')
@section('content')

    <!-- PAGE BREADCRUMB -->
    <section class="page-breadcrumb" style="background-image: url('{{ asset('assets/images') }}/{{ $basic->breadcrumb }}');">
        <div class="container">
            <div class="row justify-content-between align-content-center">
                <div class="col-md-auto">
                    <h3>Minha Conta</h3>
                </div>
                <div class="col-md-auto">
                    <ul class="au-breadcrumb">
                        <li>
                            <a href="">Home</a>
                        </li>
                        <li>
                            <span>Minha Conta</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!--== Page Content Wrapper Start ==-->
    <div id="page-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="#dashboad" class="active" data-toggle="tab"><i class="fas fa-tachometer-alt"></i>
                                        Dashboard</a>

                                    <a href="#orders" data-toggle="tab"><i class="fas fa-cart-arrow-down"></i> Meus Pedidos</a>

                                    <a href="#account-info" data-toggle="tab"><i class="fas fa-user"></i> Meus dados</a>

                                    <a href="#update-password" data-toggle="tab"><i class="fas fa-user"></i> Atualizar senha</a>

                                    <a href="{{ route('logout') }}"><i class="fas fa-sign-in-alt"></i> Sair</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->

                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 mt-15 mt-lg-0">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Dashboard</h3>

                                            <div class="welcome">
                                                <p>Olá, <strong>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</strong> <span class="float-right">(Não é <strong>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} ?</strong>
                                                <a href="{{ route('logout') }}" class="logout"> Sair</a>) </span>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </p>
                                            </div>

                                            <p class="mb-0">Do painel da sua conta. Você pode facilmente verificar e visualizar seus pedidos recentes, gerenciar seus endereços de envio e editar sua senha e detalhes da conta.</p>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="orders" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Histórico de pedidos</h3>

                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Data</th>
                                                            <th>Cód. Pedido</th>
                                                            <th>Valor Total</th>
                                                            <th>Status Entrega</th>
                                                            <th>Status Pedido</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach($order as $con)
                                                            <tr>
                                                                <td>
                                                                    {{ \Carbon\Carbon::parse($con->created_at)->format('dS M, Y - h:i:s A') }}
                                                                </td>
                                                                <td>
                                                                    {{ $con->order_number }}
                                                                </td>
                                                                <td>
                                                                    {{$basic->symbol}}{{ $con->total }}
                                                                </td>
                                                                <td>
                                                                    @if($con->shipping_status == 0)
                                                                        <span class="label label-danger"><i class="fa fa-times"></i> Not Start</span>
                                                                    @elseif($con->shipping_status == 1)
                                                                        <span class="label label-warning"><i class="fa fa-spinner"></i> Pending</span>
                                                                    @elseif($con->shipping_status == 2)
                                                                        <span class="label label-danger"><i class="fa fa-times"></i> Cancel</span>
                                                                    @else
                                                                        <span class="label label-success"><i class="fa fa-check"></i> Confirm</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($con->status == 0)
                                                                        <span class="label label-warning"><i class="fa fa-spinner"></i> Pending</span>
                                                                    @elseif($con->status == 1)
                                                                        <span class="label label-success"><i class="fa fa-check"></i> Confirm</span>
                                                                    @else
                                                                        <span class="label label-danger"><i class="fa fa-times"></i> Cancel</span>
                                                                    @endif
                                                                </td>
                                                                <td><a href="{{ route('user-order-view',$con->order_number) }}" class="btn">Ver</a></td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="pagination-bar">
                                                {!! $order->links('home.pagination') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Dados da conta</h3>

                                            <div class="account-details-form">
                                                <form action="{{ route('user-update-profile') }}" method="POST" enctype="multipart/form-data">
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
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="f-name" class="required">Nome</label>
                                                                <input type="text" id="f-name" name="first_name" value="{{ $user->first_name }}" required placeholder="First Name">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="l-name" class="required">Last Name</label>
                                                                <input type="text" id="l-name" name="last_name" value="{{ $user->last_name }}" required placeholder="Last Name">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @php $date = str_replace('-', '/', $user->birth); $birth = date('d/m/Y', strtotime($date)); @endphp

                                                    <div class="row">
                                                        <div class="single-input-item col">
                                                            <label for="birth" class="required">Nascimento</label>
                                                            <input type="text" id="birth"name="birth" value="{{ $birth }}" required placeholder="01/01/1990">
                                                        </div>
                                                        <div class="single-input-item col">
                                                            <label for="cpf" class="required">CPF</label>
                                                            <input type="text" id="cpf" name="cpf" value="{{ $user->cpf }}" required placeholder="01/01/1990">
                                                        </div>
                                                    </div>

                                                    <div class="single-input-item">
                                                        <label for="email" class="required">Email</label>
                                                        <input type="email" id="email" name="email" value="{{ $user->email }}" required placeholder="Email Address">
                                                    </div>

                                                    <div class="single-input-item">
                                                        <button name="submit" type="submit" class="btn">Atualizar dados</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show" id="update-password" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Atualizar senha</h3>

                                            <div class="account-details-form">
                                                <form action="{{ route('user-update-password') }}" method="POST" enctype="multipart/form-data">
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
                                                    <fieldset>
                                                        <div class="single-input-item">
                                                            <label for="login-pass" class="required">Senha atual</label>
                                                            <input type="password" name="old_password" required id="login-pass" placeholder="Senha atual">
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="new-pwd" class="required">Nova senha</label>
                                                                    <input type="password" id="new-pwd" name="password" placeholder="Nova senha">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="re-enter-pass" class="required">Confirmar Senha</label>
                                                                    <input type="password" id="re-enter-pass" name="password_confirmation" required placeholder="Confirmar senha">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <div class="single-input-item">
                                                        <button name="submit" type="submit" class="btn">Atualizar senha</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    </div>
                                </div>
                                <!-- My Account Tab Content End -->
                            </div>
                            </div>
                            <!-- My Account Page End -->
                        </div>
                    </div>
                </div>
            </div>
            <!--== Page Content Wrapper End ==-->

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

@endsection