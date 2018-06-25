@extends('layout')
@section('title', 'Login/Register')

@section('content')
    <div class="login">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="login-logo">
                        <img src="/img/logo_white.png">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    @if(session()->has('message'))
                        <div class="alert message-success">
                            {{ session()->get('message') }}
                            <a class="close secondary-text" data-dismiss="alert" aria-label="close" title="close">×</a>
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{ Form::text('email', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Email']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::password('password', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Password']) }}
                            <div class="row">
                                <div class="col-md-12 forgot">
                                    <a href="" class="float-right secondary-text">Forgot?</a>
                                </div>
                            </div>
                        </div>
                        @if($errors->any())
                            <p class="red">
                                {{ $errors->first() }}
                                @if(session('token'))
                                    <a href="{{ route('verify.resend', ['token' => session('token')]) }}" class="resend secondary-text">Resend</a>
                                @endif
                            </p>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <label class="checkbox-container">Remember Me
                                    <input type="checkbox" name="remember_me">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                {{ Form::submit('Login', ['class' => 'btn float-right']) }}
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <form action="{{ route('register') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        {{ Form::text('username', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Username']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::text('email', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Email']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::password('password', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Password']) }}
                    </div>
                    @if($errors->any())
                        <p class="red">
                            {{ $errors->first() }}
                            @if(session('token'))
                                <a href="{{ route('verify.resend', ['token' => session('token')]) }}" class="resend secondary-text">Resend</a>
                            @endif
                        </p>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::submit('Register', ['class' => 'btn float-right']) }}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection