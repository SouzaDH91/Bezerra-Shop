@extends('layouts.fontEnd')
@section('content')

    <!-- PAGE INFO -->
    <section class="page-info set-bg" style="background-image: url('{{ asset('assets/images') }}/{{ $basic->breadcrumb }}');">
        <div class="section-header">
            <span>~ {{ $page_title }} ~</span>
        </div>
    </section>

    <!-- CONTACT US -->
    <section class="contact-us section-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-us-content">
                        <h3>Informações de contato</h3>
                        
                        <div class="contact-us-row row">
                            <div class="col-md-4">
                                <div class="contact-us-col">
                                    <h5><i class="zmdi zmdi-phone mr-3"></i>Telefone</h5>
                                    <div class="body">
                                        <div class="contact-info">
                                            <a href="tel:{{ $basic->phone }}">{{ $basic->phone }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="contact-us-col">
                                    <h5><i class="zmdi zmdi-email mr-3"></i>Email</h5>
                                    <div class="body">
                                        <div class="contact-info">
                                            <a href="mailto:{{ $basic->email }}">{{ $basic->email }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="contact-us-col">
                                    <h5>Endereço</h5>
                                    <div class="body">
                                        <div class="address">
                                            <span>{{$basic->address}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                <div class="col-md-6">
                    <div class="contact-us-form">
                        <div class="col-md-12">
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
                        <form action="{{ route('contact-submit') }}" method="POST" class="js-contact-form" name="contactform">
                        {!! csrf_field() !!}
                            <div class="row">
                                <div class="form-holder col">
                                    <input type="text" class="form-control" placeholder="Nome" name="name" required>
                                </div>
                                <div class="form-holder col">
                                    <input type="text" class="form-control" placeholder="Assunto" name="subject" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-holder col">
                                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                                </div>
                                <div class="form-holder col">
                                    <input type="text" class="form-control" placeholder="Telefone" name="phone" required>
                                </div>
                            </div>
                            <div class="form-holder">
                                <textarea class="form-control" placeholder="Escreva sua mensagem" name="message" required></textarea>
                            </div>
                            <button type="submit" name="submit" class="au-btn round has-bg medium au-btn--hover">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>				
        </div>
    </section>

    <!-- MAP -->
    <div class="js-google-map text-center" style="width: 100%" data-makericon="images/map-marker.png" data-makers='[["Royate", "Now that you visited our website,<br> how about checking out our office too?", 40.715681, -74.003427]]'>
        {!! $basic->google_map !!}
    </div>

@endsection