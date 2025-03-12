@extends('layouts.admin')
@section('title','Authorization')
@section('content')
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4">
                        <span class="app-logo">
                            <img class="logo-icon me-2"
                                 src="{{ asset('build/images/admin/logo.svg') }}"
                                 alt="logo"></span></div>
                                <h2 class="auth-heading text-center mb-5">Log in</h2>
                                <div class="auth-form-container text-start">

                        {{ html()->form('post')->route('admin.authorization')->attributes(['class'=>'auth-form login-form'])->open() }}
                        <div class="email mb-3">
                            <label class="sr-only" for="email">Email</label>
                            {{ html()->email('email')->required()->placeholder('Email address')->attributes(['id'=>'email','class'=>'form-control signin-email']) }}
                        </div><!--//form-group-->
                        <div class="password mb-3">
                            <label class="sr-only" for="password">Password</label>
                            {{ html()->password('password')->required()->placeholder('Password')->attributes(['id'=>'password','min'=>'8','class'=>'form-control signin-password']) }}
                        </div><!--//form-group-->
                        <div class="text-center">
                            {{ html()->submit('Log In')->attributes(['class'=>'btn app-btn-primary w-100 theme-btn mx-auto']) }}
                        </div>
                        {{ html()->form()->close() }}

                    </div>
                </div><!--//auth-form-container-->

            </div><!--//auth-body-->

        </div><!--//flex-column-->

        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder">
            </div>
            <div class="auth-background-mask"></div>
            <div class="auth-background-overlay p-3 p-lg-5">
                <div class="d-flex flex-column align-content-end h-100">
                    <div class="h-100"></div>
                </div>
            </div><!--//auth-background-overlay-->
        </div>
    </div><!--//auth-main-col-->
@endsection
