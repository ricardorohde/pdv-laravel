@extends('layouts.app', ['class' => 'login-page', 'page' => __('Login Page'), 'contentClass' => 'login-page'])

@section('content')
    {{-- <div class="col-md-10 text-center ml-auto mr-auto">
        <h3 class="mb-5">Log in to see how you can speed up your web development with out of the box CRUD for #User Management and more.</h3>
    </div> --}}
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
        <form class="form" method="post" action="{{ route('login') }}">
            @csrf

            <div class="card card-login card-white">
                <div style="justify-content: center;
                            align-items: center;
                            display: flex;
                            font-size: 0.5rem;" class="card-header">
                    {{-- <img src="{{ asset('black') }}/img/card-primary.png" alt=""> --}}
                    <h1 style="color: black" class="card-title">{{ __('Log in') }}</h1>
                </div>
                <div class="card-body">
                    {{-- <p class="text-dark mb-2">Sign in with <strong>admin@black.com</strong> and the password <strong>secret</strong></p> --}}
                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div style="padding: 10px 10px 10px 10px;" class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                    <div style="margin-bottom:0px"  class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div style="padding: 10px 10px 10px 10px;" class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
                        <input type="password" placeholder="{{ __('Password') }}" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" href="" class="btn btn-primary btn-lg btn-block mb-3">{{ __('Entrar') }}</button>
                    {{-- <div class="pull-left">
                        <h6>
                            <a href="{{ route('register') }}" class="link footer-link">{{ __('Create Account') }}</a>
                        </h6>
                    </div> --}}
                    {{-- <div class="pull-right">
                        <h6>
                            <a href="{{ route('password.request') }}" class="link footer-link">{{ __('Esqueceu sua senha?') }}</a>
                        </h6>
                    </div> --}}
                </div>
            </div>
        </form>
    </div>
@endsection
